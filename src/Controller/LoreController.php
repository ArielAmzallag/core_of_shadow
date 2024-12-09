<?php

namespace App\Controller;

use App\Entity\ShopLore;
use App\Repository\ShopLoreRepository;
use App\Form\LoreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/lore')]
class LoreController extends AbstractController
{
    #[Route('/', name: 'lore_index')]
    public function index(ShopLoreRepository $loreRepository): Response
    {
        return $this->render('lore/chapters.html.twig', [
            'chapters' => $loreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'lore_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lore = new ShopLore();
        $lore->setDiscoveryDate(new \DateTimeImmutable());
        
        $form = $this->createForm(LoreType::class, $lore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lore);
            $entityManager->flush();

            $this->addFlash('success', 'New chapter of shop lore has been recorded');
            return $this->redirectToRoute('lore_index');
        }

        return $this->render('lore/chapters.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/reveal', name: 'lore_reveal')]
    public function reveal(ShopLore $lore): Response
    {
        return $this->render('lore/chapters.html.twig', [
            'chapter' => $lore,
        ]);
    }

    #[Route('/{id}/edit', name: 'lore_edit')]
    public function edit(Request $request, ShopLore $lore, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LoreType::class, $lore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'The ancient texts have been updated');
            return $this->redirectToRoute('lore_index');
        }

        return $this->render('lore/chapters.html.twig', [
            'form' => $form->createView(),
            'chapter' => $lore
        ]);
    }

    #[Route('/{id}/delete', name: 'lore_delete')]
    public function delete(ShopLore $lore, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($lore);
        $entityManager->flush();

        $this->addFlash('success', 'The chapter has been sealed away');
        return $this->redirectToRoute('lore_index');
    }
}
