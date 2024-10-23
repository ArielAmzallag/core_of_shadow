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
                'email' => 'keeper@void.com',
                'roles' => ['ROLE_KEEPER'],
                'username' => 'Quantum Keeper',
                'clearance' => 'KEEPER',
                'quantum_signature' => 'Ω∞'
            ],
            [
                'email' => 'observer@void.com',
                'roles' => ['ROLE_OBSERVER'],
                'username' => 'Void Observer',
                'clearance' => 'OBSERVER',
                'quantum_signature' => 'Ψ∆'
            ],
            [
                'email' => 'initiate@void.com',
                'roles' => ['ROLE_INITIATE'],
                'username' => 'Shadow Initiate',
                'clearance' => 'INITIATE',
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
            
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'quantum_void');
            $user->setPassword($hashedPassword);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
