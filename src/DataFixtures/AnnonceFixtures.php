<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnnonceFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $annonce1 = new Annonce();
        $annonce1
        ->setAdresseDep($faker->address)
        ->setDateHeureDep($faker->dateTime)
        ->setDestination($faker->address)
        ->setNbPlacesDispo($faker->numberBetween(1,3))
        ->setPrix($faker->numberBetween(1,3));
        $manager->persist($annonce1);
        
        $annonce2 = new Annonce();
        $annonce2
        ->setAdresseDep($faker->address)
        ->setDateHeureDep($faker->dateTime)
        ->setDestination($faker->address)
        ->setNbPlacesDispo($faker->numberBetween(1,3))
        ->setPrix($faker->numberBetween(1,3));
        $manager->persist($annonce2);

        $annonce3 = new Annonce();
        $annonce3
        ->setAdresseDep($faker->address)
        ->setDateHeureDep($faker->dateTime)
        ->setDestination($faker->address)
        ->setNbPlacesDispo($faker->numberBetween(1,3))
        ->setPrix($faker->numberBetween(1,3));
        $manager->persist($annonce3);

        $manager->flush();
    }
}
