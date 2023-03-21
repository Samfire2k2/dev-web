<?php

namespace App\DataFixtures;

use faker\Factory as Faker;
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentaireFixtures extends Fixture
{
     /**
     * @param ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
        $commentaire1 = new Commentaire();
        $commentaire1
        ->setAvis($faker->text)
        ->setNote($faker->numberBetween(1,5));
        $manager->persist($commentaire1);

        $manager->flush();
    }
}
