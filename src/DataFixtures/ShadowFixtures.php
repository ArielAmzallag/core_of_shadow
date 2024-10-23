<?php

namespace App\DataFixtures;

use App\Entity\Shadow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShadowFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entries = [
            [
                'name' => 'The Void Beckons',
                'description' => 'In the vast emptiness between dying stars, I, Setronn Kardoss, first glimpsed the truth. Our universe gasps its final breaths, its entropy reaching levels beyond mortal comprehension. The League of Renewal rises from this cosmic twilight, our numbers growing as more beings awaken to our reality\'s impending dissolution.',
                'hiddenLore' => base64_encode('First key: The stars align at NGC-7291'),
                'celestialCoordinates' => '17h 42m 4s, -21° 23\' 47"',
                'quantumSignature' => '∆ψ₀',
                'temporalFrequency' => 17.42,
                'entropyLevel' => 89,
                'dimensionalKey' => 'ΩΣ-742',
                'discoveryDate' => new \DateTime('2189-11-21 03:33:33'),
                'classificationCode' => 'VOID-α',
                'containmentProtocol' => 'Quantum barrier maintenance required every 17 cycles. Temporal stabilization must not fall below 60%.',
                'realityAnchorPoint' => 'Ophiuchus Gate'
            ],
            [
                'name' => 'Coordinates to Salvation: NGC-7291',
                'description' => 'The Andromeda Protocol proved successful. Our agents have established quantum bridges across three spiral arms. The indigenous species resist, yet they fail to comprehend that their resistance hastens their own extinction. The League must persist.',
                'hiddenLore' => base64_encode('Seek the void walker at midnight'),
                'celestialCoordinates' => '22h 28m 37.8s, +30° 16\' 49"',
                'quantumSignature' => 'Ψ∞',
                'temporalFrequency' => 23.89,
                'entropyLevel' => 76,
                'dimensionalKey' => 'λΦ-291',
                'discoveryDate' => new \DateTime('2367-12-01 00:00:00'),
                'classificationCode' => 'NGC-β',
                'containmentProtocol' => 'Maintain quantum resonance within specified parameters. Bridge stability critical.',
                'realityAnchorPoint' => 'Andromeda Nexus'
            ],
            [
                'name' => 'The Renewal Manifesto',
                'description' => 'Let it be known that the League of Renewal stands as the sole barrier between existence and the encroaching void. Our methods may appear incomprehensible, even horrific to the uninitiated, but necessity drives us forward.',
                'hiddenLore' => base64_encode('The League watches from the shadows of Ophiuchus'),
                'celestialCoordinates' => '16h 15m 42s, -23° 08\' 32"',
                'quantumSignature' => 'Θ₁',
                'temporalFrequency' => 42.17,
                'entropyLevel' => 95,
                'dimensionalKey' => 'ΘΩ-333',
                'discoveryDate' => new \DateTime('1742-10-31 23:59:59'),
                'classificationCode' => 'MANIFESTO-1',
                'containmentProtocol' => 'Knowledge restricted to Level 7 clearance and above. Temporal encryption mandatory.',
                'realityAnchorPoint' => 'Renewal Core'
            ],
            [
                'name' => 'Temporal Cascade Protocol',
                'description' => 'The temporal cascade initiated at Node-742 has exceeded all projections. Reality fractures spread across seventeen dimensions, each carrying echoes of our message. The indigenous civilizations interpret these echoes as prophecies, myths, and apocalyptic visions.',
                'hiddenLore' => base64_encode('Node-742: The first breach point'),
                'celestialCoordinates' => '19h 33m 12s, -14° 15\' 01"',
                'quantumSignature' => 'Γ₃',
                'temporalFrequency' => 74.2,
                'entropyLevel' => 88,
                'dimensionalKey' => 'ΓΨ-017',
                'discoveryDate' => new \DateTime('2455-09-17 17:17:17'),
                'classificationCode' => 'TEMPORAL-Γ',
                'containmentProtocol' => 'Cascade monitoring mandatory. Timeline divergence must be maintained below critical threshold.',
                'realityAnchorPoint' => 'Temporal Node 742'
            ],
            [
                'name' => 'The Ophiuchus Incident',
                'description' => 'Their resistance was... anticipated. The quantum bridge collapse at Ophiuchus served its purpose. Those who witnessed the event now understand the futility of opposition. The void claims all, in time.',
                'hiddenLore' => base64_encode('Bridge collapse was intentional'),
                'celestialCoordinates' => '17h 42m 4s, -23° 08\' 32"',
                'quantumSignature' => 'Ω₀',
                'temporalFrequency' => 33.33,
                'entropyLevel' => 99,
                'dimensionalKey' => 'Ωα-666',
                'discoveryDate' => new \DateTime('2891-08-13 13:13:13'),
                'classificationCode' => 'INCIDENT-Ω',
                'containmentProtocol' => 'All records of the incident must be temporally encrypted. Witness relocation protocol active.',
                'realityAnchorPoint' => 'Ophiuchus Void'
            ],
            [
                'name' => 'Quantum Dissolution Patterns',
                'description' => 'Pattern recognition algorithms confirm our hypothesis. The universe\'s death throes follow predictable sequences. Each galaxy cluster exhibits unique degradation signatures, yet all point toward the same convergence point.',
                'hiddenLore' => base64_encode('Convergence point: Heat death + 17 cycles'),
                'celestialCoordinates' => '23h 59m 59s, +90° 00\' 00"',
                'quantumSignature' => 'Σ∞',
                'temporalFrequency' => 17.17,
                'entropyLevel' => 92,
                'dimensionalKey' => 'Σπ-171',
                'discoveryDate' => new \DateTime('2733-07-17 07:17:17'),
                'classificationCode' => 'PATTERN-Σ',
                'containmentProtocol' => 'Pattern analysis restricted to quantum-shielded facilities.',
                'realityAnchorPoint' => 'Universal Apex'
            ],
            [
                'name' => 'The Kardoss Doctrine',
                'description' => 'Revelation must be gradual. The human mind fractures when exposed to too much truth at once. Our agents are instructed to release information in measured doses, each carefully calibrated to the recipient\'s cognitive resilience.',
                'hiddenLore' => base64_encode('Truth is a weapon. Handle with care.'),
                'celestialCoordinates' => '00h 00m 00s, -90° 00\' 00"',
                'quantumSignature' => 'Κ₁',
                'temporalFrequency' => 1.618,
                'entropyLevel' => 73,
                'dimensionalKey' => 'Κφ-001',
                'discoveryDate' => new \DateTime('1893-06-18 06:18:00'),
                'classificationCode' => 'DOCTRINE-Κ',
                'containmentProtocol' => 'Information dissemination must follow the golden ratio sequence.',
                'realityAnchorPoint' => 'Consciousness Nexus'
            ],
            [
                'name' => 'Entropy\'s Final Theorem',
                'description' => 'The mathematics are elegant in their finality. As universal entropy approaches maximum, reality itself becomes malleable. The League\'s work exists in this malleability, shaping what comes after.',
                'hiddenLore' => base64_encode('The equation ends where we begin'),
                'celestialCoordinates' => '12h 12m 12s, +00° 00\' 00"',
                'quantumSignature' => 'ε∞',
                'temporalFrequency' => 99.99,
                'entropyLevel' => 100,
                'dimensionalKey' => 'εΘ-999',
                'discoveryDate' => new \DateTime('3157-05-15 15:15:15'),
                'classificationCode' => 'THEOREM-ε',
                'containmentProtocol' => 'Theorem must be fragmented across multiple secure locations.',
                'realityAnchorPoint' => 'Mathematical Singularity'
            ],
            [
                'name' => 'The Andromeda Convergence',
                'description' => 'Our agents in M31 report success. The quantum bridge network now spans both galaxies. When our reality falters, the network will serve as a framework for what comes after.',
                'hiddenLore' => base64_encode('Two galaxies, one destiny'),
                'celestialCoordinates' => '00h 42m 44s, +41° 16\' 09"',
                'quantumSignature' => 'Μ₃₁',
                'temporalFrequency' => 31.31,
                'entropyLevel' => 87,
                'dimensionalKey' => 'Μα-031',
                'discoveryDate' => new \DateTime('2988-04-13 04:13:13'),
                'classificationCode' => 'BRIDGE-Μ',
                'containmentProtocol' => 'Bridge maintenance requires dual-galaxy synchronization.',
                'realityAnchorPoint' => 'Andromeda Core'
            ],
            [
                'name' => 'Project Infinity Mirror',
                'description' => 'Each quantum bridge creates reflections, echoes of possibility. These reflections contain shadows of what might have been, and whispers of what must come. The League exists in all reflections, eternal and inevitable.',
                'hiddenLore' => base64_encode('Look into the mirror, become infinite'),
                'celestialCoordinates' => '13h 13m 13s, -13° 13\' 13"',
                'quantumSignature' => 'Ι∞',
                'temporalFrequency' => 13.13,
                'entropyLevel' => 91,
                'dimensionalKey' => 'Ιπ-131',
                'discoveryDate' => new \DateTime('3442-03-11 11:11:11'),
                'classificationCode' => 'MIRROR-Ι',
                'containmentProtocol' => 'Mirror activation sequence must never be fully documented in one location.',
                'realityAnchorPoint' => 'Reflection Nexus'
            ]
        ];

        foreach ($entries as $entry) {
            $shadow = new Shadow();
            $shadow->setName($entry['name']);
            $shadow->setDescription($entry['description']);
            $shadow->setHiddenLore($entry['hiddenLore']);
            $shadow->setCelestialCoordinates($entry['celestialCoordinates']);
            $shadow->setQuantumSignature($entry['quantumSignature']);
            $shadow->setTemporalFrequency($entry['temporalFrequency']);
            $shadow->setEntropyLevel($entry['entropyLevel']);
            $shadow->setDimensionalKey($entry['dimensionalKey']);
            $shadow->setDiscoveryDate($entry['discoveryDate']);
            $shadow->setClassificationCode($entry['classificationCode']);
            $shadow->setContainmentProtocol($entry['containmentProtocol']);
            $shadow->setRealityAnchorPoint($entry['realityAnchorPoint']);
            
            $manager->persist($shadow);
        }

        $manager->flush();
    }
}
