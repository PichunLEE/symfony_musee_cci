<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Commentaire;
use App\Entity\User;
use App\Entity\Oeuvre;
use App\Repository\OeuvreRepository;
use App\Repository\UserRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentaireFixture extends Fixture implements DependentFixtureInterface
{
    private $userRepo;
    private $oeuvreRepo;

    public function __construct( UserRepository $userRepo, OeuvreRepository $oeuvreRepo)
    {
        $this->userRepo = $userRepo;
        $this->oeuvreRepo = $oeuvreRepo;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        /*
        $user = $this->userRepo->findBy([
            "nom" => "Mani"
        ]);
        $oeuvre = $this->oeuvreRepo->findBy([
            "nom" => "La Grande Vague de Kanagawa"
        ]);
        */

        $commentaire = new Commentaire();
        $commentaire->setUser($this->getReference("admin"));
        $commentaire->setOeuvre($this->getReference("lavague"));
        $commentaire->setText("text du commentaire");
        $manager->persist($commentaire);
        $manager->flush();
    }

    public function getDependencies()
   {
      return [
         UserFixtures::class ,
         OeuvreFixture::class
      ];
   }
}
