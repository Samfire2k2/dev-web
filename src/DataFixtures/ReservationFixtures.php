<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $reservation1 = new Reservation();
        $reservation1
        ->setDateReserve($faker->dateTime)
        ->setNbPlaceReserve($faker->numberBetween(1,3))
        ->setPrix($faker->numberBetween(1,3));
        $manager->persist($reservation1);
        
        $reservation2 = new Reservation();
        $reservation2
        ->setDateReserve($faker->dateTime)
        ->setNbPlaceReserve($faker->numberBetween(1,3))
        ->setPrix($faker->numberBetween(1,3));
        $manager->persist($reservation2);

        $manager->flush();
    }
}
