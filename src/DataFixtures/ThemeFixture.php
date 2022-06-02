<?php

namespace App\DataFixtures;

use App\Entity\Interfaces\IRole;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ThemeFixture extends Fixture implements IRole
{
    public function load(ObjectManager $manager): void
    {
        $theme = new Theme();
        $theme->setLabel("Antiquite");
        $theme->setDescription("Epoque trés tres lointaine");
        $manager->persist($theme);
        $this->addReference("themeAntiq", $theme);
        $manager->flush();
    }
}