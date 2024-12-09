<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transactions')]
class TransactionController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/add-gold', name: 'add_gold', methods: ['POST'])]
    public function addGold(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $amount = (float) $request->request->get('amount', 0);
        $user->setGoldBalance($user->getGoldBalance() + $amount);
        
        $this->entityManager->flush();
        $this->addFlash('success', 'Gold added successfully!');

        return $this->redirectToRoute('app_home');
    }
}
