<?php

namespace App\DataFixtures;

use App\Entity\Oeuvre;
use App\Repository\ThemeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OeuvreFixture extends Fixture implements DependentFixtureInterface
{
    private $themeRepo;

    public function __construct(ThemeRepository $themeRepo)
    {
        $this->themeRepo = $themeRepo;
    }

    public function load(ObjectManager $manager): void
    {
        $oeuvre = new Oeuvre();
        
        $oeuvre->setNom("La Grande Vague de Kanagawa");
        $oeuvre->setCreation("1830 ou 1831");
        $oeuvre->setAuteur("Hokusai");
        $oeuvre->setCategorie($this->getReference("categoriePoterie"));
        $manager->persist($oeuvre);
        $this->addReference("lavague", $oeuvre);
        $manager->flush();
    }

    public function getDependencies()
   {
      return [
         CategorieFixture::class
      ];
   }
}