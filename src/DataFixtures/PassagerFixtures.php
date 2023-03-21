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
        ->setEmail("")
        ->setPassword("");
        $manager->persist($passager1);

        $manager->flush();
    }
}
