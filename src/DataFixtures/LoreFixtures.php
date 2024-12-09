<?php

namespace App\DataFixtures;

use App\Entity\ShopLore;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loreEntries = [
            [
                'chapter' => 'The First Transaction',
                'content' => 'In the depths of the quantum void, where reality frays at its edges, the first mystical transaction occurred. A wandering soul traded their shadow for a glimpse of tomorrow. The echo of that exchange still resonates through our ledgers.',
                'era' => 'ancient',
                'secretsRevealed' => 'The original price was paid in starlight and whispers.'
            ],
            [
                'chapter' => 'The Celestial Audit',
                'content' => 'When the cosmic accountants descended, their abacuses clicking with infinite calculations, they found our books balanced perfectly between light and shadow. Each blessing sold had its curse, each curse its blessing.',
                'era' => 'golden_era',
                'secretsRevealed' => 'The auditors still visit, disguised as particularly meticulous customers.'
            ],
            [
                'chapter' => 'The Void Market Crash',
                'content' => 'The great market crash of the Void Century saw countless mystical establishments fold into the abyss. Our shop survived by trading in a currency more stable than gold: possibilities.',
                'era' => 'dark_ages',
                'secretsRevealed' => 'The crash was orchestrated by a consortium of prophetic parrots.'
            ],
            [
                'chapter' => 'The Quantum Renovation',
                'content' => 'During the Reality Restructuring, our shop existed in seventeen dimensions simultaneously. The renovation added non-Euclidean storage spaces and paradox-proof warranties.',
                'era' => 'modern',
                'secretsRevealed' => 'The contractor was a time-traveling architect who built the shop before it was commissioned.'
            ],
            [
                'chapter' => 'The Customer Service Revolution',
                'content' => 'When the Complaint Department achieved sentience, it began preemptively solving problems before they occurred. Some say it can still be heard humming satisfaction surveys in its sleep.',
                'era' => 'modern',
                'secretsRevealed' => 'The department\'s consciousness spans multiple timelines to ensure maximum customer satisfaction.'
            ],
            [
                'chapter' => 'The Great Inventory Shift',
                'content' => 'A mishap with the dimensional sorting system once caused all our blessings to become curses, and vice versa. Surprisingly, sales improved that month.',
                'era' => 'modern',
                'secretsRevealed' => 'Some items still randomly switch categories during mercury retrograde.'
            ],
            [
                'chapter' => 'The Eternal Return Policy',
                'content' => 'Our famous "Satisfaction Across All Timelines" guarantee was instituted after a customer successfully returned a curse 300 years after purchase. The paperwork took four dimensions to complete.',
                'era' => 'golden_era',
                'secretsRevealed' => 'The original return receipt is still traveling backward through time.'
            ],
            [
                'chapter' => 'The Price of Dreams',
                'content' => 'The first dream was sold here for a memory and a promise. Now our dream department occupies a space between sleeping and waking, where prices are calculated in moonbeams.',
                'era' => 'ancient',
                'secretsRevealed' => 'Dreams on clearance are actually premium items from future sales.'
            ],
            [
                'chapter' => 'The Apprentice\'s Mistake',
                'content' => 'An overeager apprentice once filed our entire inventory under "M" for "Magical." It took a team of reality-bending librarians three eternities to resort everything.',
                'era' => 'dark_ages',
                'secretsRevealed' => 'Some say the original filing system made more sense than our current one.'
            ],
            [
                'chapter' => 'The Loyalty Program',
                'content' => 'Our points system transcends conventional mathematics. Frequent customers find themselves earning rewards in past lives they haven\'t lived yet.',
                'era' => 'modern',
                'secretsRevealed' => 'The rewards catalog exists in a quantum superposition of all possible benefits.'
            ]
        ];

        foreach ($loreEntries as $loreData) {
            $lore = new ShopLore();
            $lore->setChapter($loreData['chapter']);
            $lore->setContent($loreData['content']);
            $lore->setEra($loreData['era']);
            $lore->setSecretsRevealed($loreData['secretsRevealed']);
            $lore->setDiscoveryDate(new \DateTimeImmutable());
            
            $manager->persist($lore);
        }

        $manager->flush();
    }
}
