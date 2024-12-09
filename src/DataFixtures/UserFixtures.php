<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'email' => 'shopkeeper@void.com',
                'roles' => ['ROLE_SHOPKEEPER'],
                'username' => 'Master Shopkeeper',
                'clearance' => 'SHOPKEEPER',
                'quantum_signature' => 'Ω∞'
            ],
            [
                'email' => 'merchant@void.com',
                'roles' => ['ROLE_MERCHANT'],
                'username' => 'Void Merchant',
                'clearance' => 'MERCHANT',
                'quantum_signature' => 'Ψ∆'
            ],
            [
                'email' => 'customer@void.com',
                'roles' => ['ROLE_CUSTOMER'],
                'username' => 'Shadow Customer',
                'clearance' => 'CUSTOMER',
                'quantum_signature' => 'Φ₀'
            ]
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setRoles($userData['roles']);
            $user->setUsername($userData['username']);
            $user->setClearanceLevel($userData['clearance']);
            $user->setQuantumSignature($userData['quantum_signature']);
            $user->setInitiationDate(new \DateTimeImmutable());
            
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'mystic_shop');
            $user->setPassword($hashedPassword);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
