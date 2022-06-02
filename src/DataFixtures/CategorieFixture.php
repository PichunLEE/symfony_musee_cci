<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Interfaces\IRole;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CategorieFixture extends Fixture implements IRole
{
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom("Poterie");
        $categorie->setDescription("truc qui peut casser");
        $manager->persist($categorie);
        $this->addReference("categoriePoterie", $categorie);
        $manager->flush();
    }
}