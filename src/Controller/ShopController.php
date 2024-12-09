<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Blessing;
use App\Entity\Curse;
use App\Entity\ShopLore;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\BlessingRepository;
use App\Repository\CurseRepository;
use App\Repository\ShopLoreRepository;
use App\Service\RecommendationMatrix;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/shop')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(BlessingRepository $blessingRepo, CurseRepository $curseRepo): Response
    {
        return $this->render('shop/inventory.html.twig', [
            'blessings' => $blessingRepo->findAll(),
            'curses' => $curseRepo->findAll(),
            'recommended' => []
        ]);
    }
    
    public function inventory(
        BlessingRepository $blessingRepo,
        CurseRepository $curseRepo,
        RecommendationMatrix $recommendations
    ): Response {
        /** @var User $user */
        $user = $this->getUser();
        $recommendedItems = [];
        
        if ($user) {
            $recommendedItems = $recommendations->calculateRecommendations($user->getId());
        }

        return $this->render('shop/inventory.html.twig', [
            'blessings' => $blessingRepo->findAll(),
            'curses' => $curseRepo->findAll(),
            'recommended' => $recommendedItems
        ]);
    }

    #[Route('/personal-deals', name: 'shop_personal_deals')]
    public function getPersonalDeals(RecommendationMatrix $recommendations): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();
        $deals = $recommendations->calculateRecommendations($user->getId());
        
        // Apply special discounts
        foreach ($deals as &$deal) {
            $deal['discountedPrice'] = $deal['item']->getPrice() * 0.85;
            $deal['originalPrice'] = $deal['item']->getPrice();
        }
        
        return new JsonResponse(array_slice($deals, 0, 3));
    }

    #[Route('/purchase/{type}/{id}', name: 'shop_purchase')]
    public function purchaseItem(
        string $type,
        int $id,
        EntityManagerInterface $entityManager,
        BlessingRepository $blessingRepo,
        CurseRepository $curseRepo
    ): Response {
        /** @var User $user */
        $user = $this->getUser();
        
        $item = match($type) {
            'blessing' => $blessingRepo->find($id),
            'curse' => $curseRepo->find($id),
            default => throw $this->createNotFoundException()
        };

        if ($user->getGoldBalance() < $item->getPrice()) {
            $this->addFlash('error', 'Insufficient funds for this purchase');
            return $this->redirectToRoute('shop_inventory');
        }

        $user->setGoldBalance($user->getGoldBalance() - $item->getPrice());
        $user->addToPurchaseHistory([
            'type' => $type,
            'itemId' => $id,
            'price' => $item->getPrice(),
            'power' => $item->getPower(),
            'rarity' => $item->getRarity(),
            'date' => new \DateTime()
        ]);

        $entityManager->flush();

        return $this->render('shop/purchase.html.twig', [
            'item' => $item,
            'type' => $type
        ]);
    }

    #[Route('/lore', name: 'shop_lore')]
    public function viewLore(ShopLoreRepository $loreRepo): Response
    {
        return $this->render('lore/chapters.html.twig', [
            'chapters' => $loreRepo->findLatestChapters()
        ]);
    }
}
