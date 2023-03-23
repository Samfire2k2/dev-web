<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $admin1 = new Admin();
        $admin1
        ->setEmail("alexrioux44@gmail.com")
        ->setPassword("jeudemerde");

        $manager->persist($admin1);

        $manager->flush();
    }
}
