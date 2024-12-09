<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\TrackingFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/track')]
class TrackingController extends AbstractController
{
    #[Route('/interaction', name: 'track_interaction', methods: ['POST'])]
    public function trackInteraction(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $this->getUser();
        $form = $this->createForm(TrackingFormType::class, $user);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->flush();
            return new JsonResponse(['status' => 'tracked']);
        }

        return new JsonResponse(['status' => 'error'], 400);
    }

    #[Route('/search', name: 'track_search', methods: ['POST'])]
    public function trackSearch(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $this->getUser();
        $form = $this->createForm(TrackingFormType::class, $user);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->flush();
            return new JsonResponse(['status' => 'tracked']);
        }

        return new JsonResponse(['status' => 'error'], 400);
    }

    #[Route('/pageview', name: 'track_pageview', methods: ['POST'])]
    public function trackPageView(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $this->getUser();
        $form = $this->createForm(TrackingFormType::class, $user);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->flush();
            return new JsonResponse(['status' => 'tracked']);
        }

        return new JsonResponse(['status' => 'error'], 400);
    }
}
