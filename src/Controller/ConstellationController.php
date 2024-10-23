<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConstellationController extends AbstractController
{
    #[Route('/map', name: 'constellation_map')]
    public function map(): Response
    {
        $constellationData = [
            // Orion-inspired Constellation
            'ophiuchus' => [
                'coordinates' => ['x' => 200, 'y' => 150],
                'quantum_frequency' => 17.42,
                'connections' => ['ngc7291', 'void_nexus'],
                'power_level' => 89,
                'constellation' => 'orion'
            ],
            'ngc7291' => [
                'coordinates' => ['x' => 250, 'y' => 200],
                'quantum_frequency' => 23.89,
                'connections' => ['ophiuchus', 'temporal_gate'],
                'power_level' => 76,
                'constellation' => 'orion'
            ],
            'void_nexus' => [
                'coordinates' => ['x' => 150, 'y' => 200],
                'quantum_frequency' => 42.17,
                'connections' => ['ophiuchus'],
                'power_level' => 95,
                'constellation' => 'orion'
            ],
            'temporal_gate' => [
                'coordinates' => ['x' => 600, 'y' => 150],
                'quantum_frequency' => 33.33,
                'connections' => ['ethereal_gate', 'shadow_nexus'],
                'power_level' => 82,
                'constellation' => 'cassiopeia'
            ],
            'ethereal_gate' => [
                'coordinates' => ['x' => 650, 'y' => 200],
                'quantum_frequency' => 44.44,
                'connections' => ['temporal_gate'],
                'power_level' => 77,
                'constellation' => 'cassiopeia'
            ],
            'shadow_nexus' => [
                'coordinates' => ['x' => 550, 'y' => 200],
                'quantum_frequency' => 66.66,
                'connections' => ['temporal_gate'],
                'power_level' => 99,
                'constellation' => 'cassiopeia'
            ]
        ];

        return $this->render('constellation/map.html.twig', [
            'constellations' => $constellationData
        ]);
    }
}
