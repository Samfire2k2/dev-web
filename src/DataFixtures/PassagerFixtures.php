<?php

namespace App\DataFixtures;

use Faker\Factory as Faker;
use App\Entity\Passager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PassagerFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $passager1 = new Passager();
        $passager1
        ->setEmail("alexrioux44@gmail.com")
        ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$L3c5MlNIOGdTUEttNUd0NQ$EYGjwC5KkwMZQEW2WiWzPhvJxbeW5vubdmSqZvpBdIs')
        ->setRoles(["ROLE_ADMIN"]);
        $manager->persist($passager1);

        $manager->flush();
    }
}
