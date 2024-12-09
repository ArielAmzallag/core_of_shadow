<?php

namespace App\DataFixtures;

use App\Entity\Blessing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlessingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blessings = [
            [
                'name' => 'Seraphic Tax Exemption',
                'power' => 85.0,
                'price' => 777.0,
                'duration' => 14,
                'benefits' => 'Celestial accountants declare you exempt from karmic debt. Even death and taxes can be negotiated when you have angels in accounting!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Phoenix Dental Plan',
                'power' => 65.0,
                'price' => 450.0,
                'duration' => 7,
                'benefits' => 'Your teeth regenerate in flames when damaged. Dentists hate this one weird trick! Warning: May trigger smoke alarms during cavities.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Quantum Saint\'s Favor',
                'power' => 95.0,
                'price' => 999.0,
                'duration' => 30,
                'benefits' => 'Probability itself bends to favor you. You\'ll always find parking, your toast always lands butter-side up, and quantum physics gives you a thumbs up!',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Archangel\'s Coffee Break',
                'power' => 75.0,
                'price' => 500.0,
                'duration' => 10,
                'benefits' => 'Time stops when you need a break. The universe can wait while you enjoy your perfectly temperature-controlled beverage.',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Celestial Wardrobe Malfunction',
                'power' => 80.0,
                'price' => 600.0,
                'duration' => 21,
                'benefits' => 'Your clothes are woven from pure starlight. Dazzling fashion statement! Note: May cause temporary blindness in mortals and attract moths from other dimensions.',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Divine WiFi Connection',
                'power' => 70.0,
                'price' => 420.0,
                'duration' => 14,
                'benefits' => 'Access the celestial internet. Download speeds are infinite, but all your searches are monitored by cherubim IT department.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Blessed Metabolism Override',
                'power' => 90.0,
                'price' => 888.0,
                'duration' => 28,
                'benefits' => 'Your body transmutes junk food into pure nutrition. Finally, pizza counts as a superfood! Side effect: Your burps smell like heaven.',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Holy Procrastinator\'s Pardon',
                'power' => 60.0,
                'price' => 350.0,
                'duration' => 7,
                'benefits' => 'Deadlines extend themselves in your presence. Time itself agrees that you\'ll get to it eventually.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Saintly Social Skills',
                'power' => 85.0,
                'price' => 650.0,
                'duration' => 14,
                'benefits' => 'Channel the charisma of history\'s most beloved saints. Even your awkward stories become inspiring parables!',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Heavenly Hindsight',
                'power' => 99.0,
                'price' => 1200.0,
                'duration' => 3,
                'benefits' => 'Temporarily view all your past mistakes with divine wisdom. Bonus: Includes heavenly laugh track for your most embarrassing moments.',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Angelic Auto-Correct',
                'power' => 70.0,
                'price' => 440.0,
                'duration' => 10,
                'benefits' => 'Your speech is automatically corrected by guardian angels. Every accidental curse word becomes a divine proclamation.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Sacred Sleep Schedule',
                'power' => 88.0,
                'price' => 777.0,
                'duration' => 21,
                'benefits' => 'Your sleep is blessed by the gods. Each nap feels like a full night\'s rest, and your dreams come with celestial surround sound.',
                'rarity' => 'epic'
            ],
            [
                'name' => 'Miracle Morning Person',
                'power' => 75.0,
                'price' => 525.0,
                'duration' => 14,
                'benefits' => 'Wake up every morning feeling divinely refreshed. Includes complementary choir of angels instead of an alarm clock.',
                'rarity' => 'rare'
            ],
            [
                'name' => 'Blessed Backup Brain',
                'power' => 95.0,
                'price' => 950.0,
                'duration' => 30,
                'benefits' => 'Your memories are backed up to the celestial cloud. Never forget where you put your keys again! Premium subscription includes past life memories.',
                'rarity' => 'legendary'
            ],
            [
                'name' => 'Divine Drama Shield',
                'power' => 80.0,
                'price' => 680.0,
                'duration' => 14,
                'benefits' => 'A force field that repels unnecessary drama. Family reunions become surprisingly peaceful, and your social media feeds purify themselves.',
                'rarity' => 'epic'
            ]
        ];

        foreach ($blessings as $blessingData) {
            $blessing = new Blessing();
            $blessing->setName($blessingData['name']);
            $blessing->setPower($blessingData['power']);
            $blessing->setPrice($blessingData['price']);
            $blessing->setDuration($blessingData['duration']);
            $blessing->setBenefits($blessingData['benefits']);
            $blessing->setRarity($blessingData['rarity']);
            
            $manager->persist($blessing);
        }

        $manager->flush();
    }
}
