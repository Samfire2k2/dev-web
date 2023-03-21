<?php

namespace App\DataFixtures;

use App\Entity\Conducteur;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConducteurFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $conducteur1 = new Conducteur();
        $conducteur1
        ->setEmail("")
        ->setPassword("");
        $manager->persist($conducteur1);
        $manager->flush();
        $this->addReference('conducteur1',$conducteur1);
    }
}
