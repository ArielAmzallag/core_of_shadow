<?php

namespace App\Controller;

use App\Entity\Curse;
use App\Repository\CurseRepository;
use App\Form\CurseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/curse')]
class CurseController extends AbstractController
{
    #[Route('/', name: 'curse_index')]
    public function index(CurseRepository $curseRepository): Response
    {
        return $this->render('curse/list.html.twig', [
            'curses' => $curseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'curse_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $curse = new Curse();
        $form = $this->createForm(CurseType::class, $curse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($curse);
            $entityManager->flush();

            $this->addFlash('success', 'New curse has been added to the shop');
            return $this->redirectToRoute('curse_index');
        }

        return $this->render('shop/item_details.html.twig', [
            'form' => $form->createView(),
            'item_type' => 'curse'
        ]);
    }

    #[Route('/{id}/edit', name: 'curse_edit')]
    public function edit(Request $request, Curse $curse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CurseType::class, $curse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Curse has been updated');
            return $this->redirectToRoute('curse_index');
        }

        return $this->render('shop/item_details.html.twig', [
            'form' => $form->createView(),
            'item_type' => 'curse'
        ]);
    }

    #[Route('/{id}/delete', name: 'curse_delete')]
    public function delete(Curse $curse, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($curse);
        $entityManager->flush();

        $this->addFlash('success', 'Curse has been removed from the shop');
        return $this->redirectToRoute('curse_index');
    }
}
