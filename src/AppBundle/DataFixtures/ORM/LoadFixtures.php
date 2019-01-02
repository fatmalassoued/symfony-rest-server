<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $auteur = new Auteur();
        $auteur->setNom('Octopus'.rand(1, 100));
        $auteur->Setprenom('Octopodinae');
        $auteur->setEmail('mayssakarmeni@gmail.com'.rand(100, 99999));
        // $auteur->setLivre('ttttt');
        $manager->persist($auteur);
        $Livre = new Livre();
        $Livre->setTitre('Mayssa'); //$Livre->setTitre('Octopus'.rand(1, 100));
        $Livre->setDescriptif('Karmeni');
        $Livre->setISBN('testFixture');
        $Livre->setDate(new \DateTime());
        $manager->persist($Livre);
        $manager->flush();
    }
}
