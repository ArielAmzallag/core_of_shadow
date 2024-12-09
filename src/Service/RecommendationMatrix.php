<?php

namespace App\Service;

use App\Repository\BlessingRepository;
use App\Repository\CurseRepository;
use App\Repository\UserRepository;
use App\Entity\Blessing;

class RecommendationMatrix
{
    public function __construct(
        private BlessingRepository $blessingRepo,
        private CurseRepository $curseRepo,
        private UserRepository $userRepo
    ) {}

    public function calculateRecommendations(int $userId): array
    {
        $user = $this->userRepo->find($userId);
        if (!$user) {
            return [];
        }

        $behaviorScore = $this->analyzeBehavioralData($user);
        $purchaseHistory = $user->getPurchaseHistory();
        $preferences = $this->analyzeUserBehavior($purchaseHistory, $behaviorScore);
        $itemWeights = $this->calculateItemWeights($preferences);
        
        $blessings = $this->blessingRepo->findAll();
        $curses = $this->curseRepo->findAll();
        
        $recommendations = $this->scoreItems($blessings, $curses, $itemWeights, $preferences, $behaviorScore);
        
        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);
        return array_slice($recommendations, 0, 5);
    }

    private function analyzeBehavioralData($user): array
    {
        $behaviorScore = [
            'itemInterests' => [],
            'categoryPreferences' => [],
            'priceRange' => [0, 0],
            'powerPreference' => 0
        ];

        foreach ($user->getItemInteractions() as $interaction) {
            $weight = match($interaction['type']) {
                'hover' => 0.2,
                'click' => 0.5,
                'view' => 0.3,
                default => 0.1
            };

            $behaviorScore['itemInterests'][$interaction['itemId']] ??= 0;
            $behaviorScore['itemInterests'][$interaction['itemId']] += $weight;
        }

        foreach ($user->getCategoryPreferences() as $category => $preference) {
            $behaviorScore['categoryPreferences'][$category] = $preference;
        }

        return $behaviorScore;
    }

    private function analyzeUserBehavior(array $purchases, array $behaviorScore): array
    {
        $preferences = [
            'powerPreference' => 0.0,
            'priceRange' => [0, 0],
            'rarityPreference' => [],
            'themePreference' => [],
            'itemTypeBalance' => ['blessing' => 0, 'curse' => 0]
        ];

        foreach ($purchases as $purchase) {
            $preferences['powerPreference'] += $purchase['power'] ?? 0;
            $preferences['priceRange'][1] = max($preferences['priceRange'][1], $purchase['price'] ?? 0);
            
            if (isset($purchase['rarity'])) {
                $preferences['rarityPreference'][$purchase['rarity']] ??= 0;
                $preferences['rarityPreference'][$purchase['rarity']]++;
            }
            
            if (isset($purchase['type'])) {
                $preferences['itemTypeBalance'][$purchase['type']] ??= 0;
                $preferences['itemTypeBalance'][$purchase['type']]++;
            }
        }

        return $preferences;
    }

    private function calculateItemWeights(array $preferences): array
    {
        $weights = [
            'rarity' => 0.3,
            'price' => 0.2,
            'power' => 0.3,
            'theme' => 0.2
        ];

        if (count($preferences['rarityPreference']) > 0) {
            $weights['rarity'] += 0.1;
        }

        if (!empty($preferences['themePreference'])) {
            $weights['theme'] += 0.1;
        }

        return $weights;
    }

    private function scoreItems(array $blessings, array $curses, array $weights, array $preferences, array $behaviorScore): array
    {
        $recommendations = [];
        
        foreach ($blessings as $blessing) {
            $score = $this->calculateItemScore($blessing, $weights, $preferences, $behaviorScore);
            if ($score > 0.5) {
                $recommendations[] = [
                    'item' => $blessing,
                    'type' => 'blessing',
                    'score' => $score,
                    'reason' => $this->generateRecommendationReason($blessing, $behaviorScore)
                ];
            }
        }

        foreach ($curses as $curse) {
            $score = $this->calculateItemScore($curse, $weights, $preferences, $behaviorScore);
            if ($score > 0.5) {
                $recommendations[] = [
                    'item' => $curse,
                    'type' => 'curse',
                    'score' => $score,
                    'reason' => $this->generateRecommendationReason($curse, $behaviorScore)
                ];
            }
        }

        return $recommendations;
    }

    private function calculateItemScore($item, array $weights, array $preferences, array $behaviorScore): float
    {
        $baseScore = $weights['rarity'] * $this->getRarityScore($item->getRarity(), $preferences['rarityPreference']) +
                    $weights['price'] * $this->getPriceScore($item->getPrice(), $preferences['priceRange']) +
                    $weights['power'] * $this->getPowerScore($item->getPower(), $preferences['powerPreference']);

        $interactionBonus = $behaviorScore['itemInterests'][$item->getId()] ?? 0;
        $categoryBonus = $behaviorScore['categoryPreferences'][$item->getRarity()] ?? 0;

        return min(1.0, $baseScore + ($interactionBonus * 0.2) + ($categoryBonus * 0.1));
    }

    private function getRarityScore(string $rarity, array $rarityPreferences): float
    {
        $baseScore = match($rarity) {
            'common' => 0.2,
            'uncommon' => 0.4,
            'rare' => 0.6,
            'epic' => 0.8,
            'legendary' => 1.0,
            default => 0.0
        };

        if (isset($rarityPreferences[$rarity])) {
            $baseScore += 0.2;
        }

        return $baseScore;
    }

    private function getPriceScore(float $price, array $priceRange): float
    {
        if ($priceRange[1] === 0) {
            return 0.5;
        }
        return 1 - (abs($price - $priceRange[1]) / $priceRange[1]);
    }

    private function getPowerScore(float $power, float $preferredPower): float
    {
        if ($preferredPower === 0) {
            return 0.5;
        }
        return 1 - (abs($power - $preferredPower) / 100);
    }

    private function generateRecommendationReason($item, array $behaviorScore): string
    {
        $reasons = [
            'high_interaction' => "Based on your interest in similar items",
            'category_match' => "Matches your preferred category of {$item->getRarity()}",
            'power_match' => "Aligns with your power level preferences",
            'price_range' => "Within your typical price range"
        ];

        $strongestFactor = $this->determineStrongestFactor($item, $behaviorScore);
        return $reasons[$strongestFactor];
    }

    private function determineStrongestFactor($item, array $behaviorScore): string
    {
        if (isset($behaviorScore['itemInterests'][$item->getId()]) && $behaviorScore['itemInterests'][$item->getId()] > 0.5) {
            return 'high_interaction';
        }
        
        if (isset($behaviorScore['categoryPreferences'][$item->getRarity()]) && $behaviorScore['categoryPreferences'][$item->getRarity()] > 0.3) {
            return 'category_match';
        }

        return 'power_match';
    }
}
