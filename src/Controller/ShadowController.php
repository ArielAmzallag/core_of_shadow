<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Shadow;
use App\Repository\ShadowRepository;
use App\Form\ShadowType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ShadowController extends AbstractController
{
    #[Route('/', name: 'app_shadow')]
    public function index(ShadowRepository $shadowRepository): Response
    {
        $shadows = $shadowRepository->findAll();
        return $this->render('shadow/index.html.twig', [
            'shadows' => $shadows,
        ]);
    }

    #[Route('/whispers/{code}', name: 'shadow_whispers')]
    public function whispers(string $code): Response
    {
        $secretLore = match($code) {
            'darkness_calls' => 'In the depths of night, it speaks...',
            'void_walker' => 'Footsteps that leave no trace, yet echo through eternity...',
            'quantum_signature' => base64_decode('UXVhbnR1bSBzaWduYXR1cmUgZGV0ZWN0ZWQ6IFNldHJvbm4gS2FyZG9zcw=='),
            'temporal_anomaly' => base64_decode('VGVtcG9yYWwgZnJlcXVlbmN5IGFsaWdubWVudCBkZXRlY3RlZA=='),
            default => 'The shadows remain silent...'
        };
        
        return $this->render('shadow/whispers.html.twig', [
            'lore' => $secretLore
        ]);
    }

    #[Route('/echoes', name: 'shadow_echoes')]
    public function echoes(): Response
    {
        $clues = [
            'north' => 'Where darkness meets light',
            'hidden' => base64_encode('Seek the void walker at midnight'),
        ];
        
        return $this->render('shadow/echoes.html.twig', [
            'clues' => $clues
        ]);
    }

    #[Route('/lore/new', name: 'shadow_new_lore')]
    public function newLore(Request $request, EntityManagerInterface $entityManager): Response
    {
        $shadow = new Shadow();
        $form = $this->createForm(ShadowType::class, $shadow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($shadow);
            $entityManager->flush();

            $this->addFlash('success', 'New lore has been recorded in the shadows: ' . $shadow->getName());
            return $this->redirectToRoute('app_shadow');
        }

        return $this->render('shadow/new_lore.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/lore/edit/{id}', name: 'shadow_edit_lore')]
    public function editLore(Request $request, Shadow $shadow, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ShadowType::class, $shadow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'The shadows shift as the lore changes...');
            return $this->redirectToRoute('app_shadow');
        }

        return $this->render('shadow/edit_lore.html.twig', [
            'form' => $form->createView(),
            'shadow' => $shadow
        ]);
    }

    #[Route('/lore/delete/{id}', name: 'shadow_delete_lore')]
    public function deleteLore(Shadow $shadow, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($shadow);
        $entityManager->flush();

        $this->addFlash('success', 'The shadows consume another secret...');
        return $this->redirectToRoute('app_shadow');
    }
}
