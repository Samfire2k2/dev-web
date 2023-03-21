<?php

namespace App\DataFixtures;

use Faker\Factory as Faker;
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

        $faker = Faker::create('fr_FR');
        $commentaire2 = new Commentaire();
        $commentaire2
        ->setAvis($faker->text)
        ->setNote($faker->numberBetween(1,5));
        $manager->persist($commentaire2);

        $manager->flush();
        $this->addReference('commentaire1',$commentaire1);
        $this->addReference('commentaire2',$commentaire2);
    }
}
