<?php

namespace App\DataFixtures;

use App\Entity\Curse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $curses = [
            [
                'name' => 'Flesh Puppeteer\'s Delight',
                'power' => 85.0,
                'price' => 666.0,
                'duration' => 7,
                'sideEffects' => 'Your skin occasionally decides to take a walk without you. Don\'t worry, it always comes back... usually with souvenirs!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Soul Merchant\'s Bargain',
                'power' => 95.0,
                'price' => 850.0,
                'duration' => 14,
                'sideEffects' => 'Your soul is sold and resold on the infernal stock market. Each new owner has different ideas about your life choices. Tuesday\'s demon wants you to become a mime!',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Bloodthirsty Wardrobe',
                'power' => 75.0,
                'price' => 450.0,
                'duration' => 10,
                'sideEffects' => 'Your clothes develop a taste for human flesh. "Feed me!" says your favorite jacket. Your socks are particularly demanding gourmets.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Organ Reorganization',
                'power' => 80.0,
                'price' => 500.0,
                'duration' => 5,
                'sideEffects' => 'Your internal organs play musical chairs daily. Heart in your knee? Liver behind your eyes? It\'s a surprise every morning!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Nightmare Roommate',
                'power' => 70.0,
                'price' => 400.0,
                'duration' => 30,
                'sideEffects' => 'A demon from the 9th circle of hell moves in. Doesn\'t pay rent, eats souls, and never does the dishes. Still better than your college roommate.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Bone Collector\'s Whimsy',
                'power' => 90.0,
                'price' => 700.0,
                'duration' => 12,
                'sideEffects' => 'Your skeleton occasionally leaves to attend underground poker games. Returns with either more bones or IOUs from other skeletons.',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Void Stomach',
                'power' => 99.0,
                'price' => 999.0,
                'duration' => 21,
                'sideEffects' => 'Your stomach becomes a portal to the void. Eating anything feeds eldritch horrors instead. They rate your food choices on Yelp.',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Memory Cannibal',
                'power' => 88.0,
                'price' => 600.0,
                'duration' => 14,
                'sideEffects' => 'Your memories are devoured and replaced with someone else\'s. Yesterday you were a medieval peasant, today you\'re a space pirate!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Blood Rain Serenade',
                'power' => 65.0,
                'price' => 350.0,
                'duration' => 7,
                'sideEffects' => 'It rains blood wherever you go. On the bright side, local vampires give you 5-star ratings on supernatural Uber.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Shadow Stitcher\'s Thread',
                'power' => 85.0,
                'price' => 550.0,
                'duration' => 9,
                'sideEffects' => 'Your shadow is slowly stitched into elaborate patterns by invisible needles. Hurts like hell, but hey, great conversation starter!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Plague Doctor\'s Prescription',
                'power' => 70.0,
                'price' => 420.0,
                'duration' => 13,
                'sideEffects' => 'Medieval diseases manifest randomly. Black Death on Monday, Dancing Plague on Tuesday. Your HMO doesn\'t cover this.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Doppelganger Factory',
                'power' => 95.0,
                'price' => 888.0,
                'duration' => 15,
                'sideEffects' => 'Evil copies of you spawn from mirrors. They do all your tasks but maliciously. Your evil twin just got you promoted... to company scapegoat.',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Teeth Lottery',
                'power' => 75.0,
                'price' => 475.0,
                'duration' => 8,
                'sideEffects' => 'Your teeth randomly transform into other people\'s teeth. Sometimes you get a celebrity\'s perfect veneers, sometimes you get a goblin\'s fangs.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Dream Butcher\'s Mark',
                'power' => 92.0,
                'price' => 777.0,
                'duration' => 11,
                'sideEffects' => 'Your dreams are carved into your skin while you sleep. Last night\'s nightmare about tap-dancing spiders is now a full sleeve tattoo.',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Ancestral Debt Collector',
                'power' => 88.0,
                'price' => 666.0,
                'duration' => 20,
                'sideEffects' => 'The sins of your ancestors come due. Turns out great-great-grandpa made some questionable deals. Now you\'re paying off his tab to various mythological creditors.',
                'rarity' => 'epic'
            ]
        ];

        foreach ($curses as $curseData) {
            $curse = new Curse();
            $curse->setName($curseData['name']);
            $curse->setPower($curseData['power']);
            $curse->setPrice($curseData['price']);
            $curse->setDuration($curseData['duration']);
            $curse->setSideEffects($curseData['sideEffects']);
            $curse->setRarity($curseData['rarity']);
            
            $manager->persist($curse);
        }

        $manager->flush();
    }
}
