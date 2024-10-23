<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
  class CipherController extends AbstractController
  {
      #[Route('/cipher/{pattern}', name: 'cipher_decode')]
      public function decode(string $pattern): Response
      {
          $decodedData = match($pattern) {
              'void_walker' => [
                  'message' => base64_decode('VGhlIHZvaWQgd2Fsa2VyIHN0YWxrcyB0aGUgZWRnZSBvZiByZWFsaXR5'),
                  'quantum_signature' => '∆ψ₀',
                  'temporal_frequency' => 17.42,
                  'entropy_level' => 89
              ],
              'ophiuchus' => [
                  'message' => $this->decodeOphiuchus(),
                  'quantum_signature' => 'Θ₁',
                  'temporal_frequency' => 42.17,
                  'entropy_level' => 95
              ],
              'ngc7291' => [
                  'message' => $this->decodeNGC(),
                  'quantum_signature' => 'Ψ∞',
                  'temporal_frequency' => 23.89,
                  'entropy_level' => 76
              ],
              'quantum_key' => [
                  'message' => $this->decodeQuantumSignature(),
                  'quantum_signature' => 'Ω∞',
                  'temporal_frequency' => 33.33,
                  'entropy_level' => 99
              ],
              'temporal_gate' => [
                  'message' => $this->decodeTemporalFrequency(),
                  'quantum_signature' => 'Σ∞',
                  'temporal_frequency' => 17.17,
                  'entropy_level' => 92
              ],
              default => [
                  'message' => 'The shadows remain silent...',
                  'quantum_signature' => '※',
                  'temporal_frequency' => 0,
                  'entropy_level' => 0
              ]
          };

          return $this->render('cipher/reveal.html.twig', [
              'data' => $decodedData
          ]);
      }

      private function decodeOphiuchus(): string
      {
        return base64_decode('TGVhZ3VlIG9mIFJlbmV3YWwgYXdhaXRzIGF0IHRoZSBjb25zdGVsbGF0aW9uIGdhdGVz');
    }

    private function decodeNGC(): string
    {
        return base64_decode('Q29vcmRpbmF0ZXMgdG8gdGhlIGZpcnN0IGFuY2hvciBwb2ludDogMTcuNDIsIC0yMS4yMw==');
    }

    #[Route('/constellation/{pattern}', name: 'constellation_reveal')]
    public function constellationReveal(string $pattern): Response
    {
        $constellationData = match($pattern) {
            'ophiuchus' => [
                'name' => 'Ophiuchus Gate',
                'coordinates' => '17h 42m 4s',
                'message' => base64_decode('The serpent bearer guards the quantum bridge'),
                'pattern' => ['α', 'η', 'ζ', 'ε', 'δ', 'λ', 'κ'],
                'entropy_level' => 17,
                'quantum_signature' => '∆ψ₀'
            ],
            'ngc7291' => [
                'name' => 'Temporal Anchor Point',
                'coordinates' => '-21° 23\' 47"',
                'message' => base64_decode('First convergence point established'),
                'pattern' => ['β', 'γ', 'δ', 'ε', 'ζ'],
                'entropy_level' => 23,
                'quantum_signature' => 'Ω∞'
            ],
            'void_nexus' => [
                'name' => 'Void Nexus Gate',
                'coordinates' => '42° 17\' 33"',
                'message' => base64_decode('The void pulses with ancient power'),
                'pattern' => ['θ', 'λ', 'ω', 'ψ'],
                'entropy_level' => 42,
                'quantum_signature' => 'Θ∞'
            ],
            'temporal_gate' => [
                'name' => 'Temporal Gateway',
                'coordinates' => '33° 33\' 33"',
                'message' => base64_decode('Time flows differently here'),
                'pattern' => ['τ', 'π', 'σ', 'δ'],
                'entropy_level' => 33,
                'quantum_signature' => 'τ∆'
            ],
            'shadow_nexus' => [
                'name' => 'Shadow Nexus',
                'coordinates' => '66° 66\' 66"',
                'message' => base64_decode('Shadows converge at this point'),
                'pattern' => ['χ', 'ξ', 'ζ', 'υ'],
                'entropy_level' => 66,
                'quantum_signature' => 'Σ∞'
            ],
            default => null
        };
        return $this->render('cipher/constellation.html.twig', [
            'data' => $constellationData
        ]);
    }

    private function decodeQuantumSignature(): string
    {
        return base64_decode('UXVhbnR1bSBzaWduYXR1cmUgYWxpZ25tZW50OiDiiJhceE8z4oiZIC0gU2V0cm9uIEthcmRvc3M=');
    }

    private function decodeTemporalFrequency(): string
    {
        return base64_decode('VGVtcG9yYWwgZnJlcXVlbmN5IGRldGVjdGVkOiAxNy40MiBIeg==');
    }
}
