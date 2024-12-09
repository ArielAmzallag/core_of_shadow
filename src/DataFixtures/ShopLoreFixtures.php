<?php

namespace App\DataFixtures;

use App\Entity\ShopLore;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShopLoreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shopLoreEntries = [
            [
                'chapter' => 'The Break Room Incident',
                'content' => 'The staff break room exists in a temporal bubble where coffee never gets cold and lunch breaks last exactly as long as needed. We lost three interns who took "unlimited break time" too literally.',
                'era' => 'modern',
                'secretsRevealed' => 'The coffee machine is actually a reformed demon who makes excellent espresso.'
            ],
            [
                'chapter' => 'Shelf Stocking Protocols',
                'content' => 'Our stockroom follows non-linear organizational principles. Tuesday\'s inventory might be shelved last Wednesday, while next week\'s shipment arrived last century.',
                'era' => 'modern',
                'secretsRevealed' => 'The shelves rearrange themselves when no one is looking.'
            ],
            [
                'chapter' => 'The Receipt Printer Prophecies',
                'content' => 'Our receipt printer has developed precognitive abilities. Customers occasionally receive receipts for purchases they haven\'t made yet, complete with satisfaction ratings.',
                'era' => 'modern',
                'secretsRevealed' => 'The printer predicts lottery numbers but only prints them in invisible ink.'
            ],
            [
                'chapter' => 'The Window Display Chronicles',
                'content' => 'Our window displays exist in multiple dimensions simultaneously. What appears as a simple blessing arrangement from one angle might reveal an intricate curse collection from another.',
                'era' => 'golden_era',
                'secretsRevealed' => 'The mannequins trade places with their parallel universe counterparts during full moons.'
            ],
            [
                'chapter' => 'The Price Tag Rebellion',
                'content' => 'During the great Price Tag Uprising of 2021, all our price tags gained consciousness and began negotiating their own values. We now have a Price Tag Union representative.',
                'era' => 'modern',
                'secretsRevealed' => 'The tags hold monthly poetry slams after closing time.'
            ],
            [
                'chapter' => 'The Shopping Cart Saga',
                'content' => 'Our enchanted shopping carts have developed unique personalities. Cart #23 only moves in reverse, while #47 has a PhD in theoretical physics and offers shopping advice.',
                'era' => 'modern',
                'secretsRevealed' => 'The carts hold racing competitions in the parking lot at midnight.'
            ],
            [
                'chapter' => 'The Clearance Section Anomaly',
                'content' => 'The clearance section operates on its own economic rules. Prices fluctuate based on customer karma, lunar phases, and the mood of the discount signs.',
                'era' => 'modern',
                'secretsRevealed' => 'Some items mark themselves down when they feel underappreciated.'
            ],
            [
                'chapter' => 'The Security System',
                'content' => 'Our anti-theft system consists of retired karma auditors who can spot a shoplifter across multiple incarnations. They accept bribes only in good deeds.',
                'era' => 'modern',
                'secretsRevealed' => 'The security cameras record in both past and future tense.'
            ],
            [
                'chapter' => 'The Gift Card Ecosystem',
                'content' => 'Our gift cards have developed a complex social hierarchy. Premium cards look down on store credit slips, while loyalty points act as peacekeepers.',
                'era' => 'modern',
                'secretsRevealed' => 'Expired gift cards gather in the lost and found to plan their comeback.'
            ],
            [
                'chapter' => 'The Customer Bathroom',
                'content' => 'The customer bathroom is a nexus of dimensional portals. We\'ve had to post signs in 47 languages (12 of them non-human) warning about proper interdimensional hygiene.',
                'era' => 'modern',
                'secretsRevealed' => 'The hand dryer occasionally grants wishes, but only silly ones.'
            ]
        ];

        foreach ($shopLoreEntries as $loreData) {
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
