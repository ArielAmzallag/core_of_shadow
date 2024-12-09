<?php

namespace App\Controller;

use App\Entity\Blessing;
use App\Repository\BlessingRepository;
use App\Form\BlessingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/blessing')]
class BlessingController extends AbstractController
{
    #[Route('/', name: 'blessing_index')]
    public function index(BlessingRepository $blessingRepository): Response
    {
        return $this->render('blessing/list.html.twig', [
            'blessings' => $blessingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'blessing_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $blessing = new Blessing();
        $form = $this->createForm(BlessingType::class, $blessing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($blessing);
            $entityManager->flush();

            $this->addFlash('success', 'New blessing has been added to the shop');
            return $this->redirectToRoute('blessing_index');
        }

        return $this->render('shop/item_details.html.twig', [
            'form' => $form->createView(),
            'item_type' => 'blessing'
        ]);
    }

    #[Route('/{id}/edit', name: 'blessing_edit')]
    public function edit(Request $request, Blessing $blessing, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BlessingType::class, $blessing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Blessing has been updated');
            return $this->redirectToRoute('blessing_index');
        }

        return $this->render('shop/item_details.html.twig', [
            'form' => $form->createView(),
            'item_type' => 'blessing'
        ]);
    }

    #[Route('/{id}/delete', name: 'blessing_delete')]
    public function delete(Blessing $blessing, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($blessing);
        $entityManager->flush();

        $this->addFlash('success', 'Blessing has been removed from the shop');
        return $this->redirectToRoute('blessing_index');
    }
}
