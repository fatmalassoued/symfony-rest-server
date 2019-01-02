<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Auteur;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class AuteurController extends FOSRestController
{
    /**
     * @Rest\Get("/auteurs")
     */
    public function getAction()
    {
        $result = $this->getDoctrine()->getRepository(Auteur::class)->findAll();
        if ($result === null) {
            return new View('ilya pas des auteurs ', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Post("/auteurs")
     */
    public function addAutheur(Request $request)
    {
        $Auteur = new Auteur();
        $Auteur->setNom('karmeni mayssa POST');
        $Auteur->setPrenom('karmeni POST');

        $Auteur->setEmail('mayssakarmeni@gmail.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($Auteur);
        $em->flush();

        return new View('auteur ajouté avec succeé  ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/auteurs/{id}")
     */
    public function updateLivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $Auteur = $repo->find($id);
        if ($Auteur == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $Auteur->setNom('Put mayssa');
        $Auteur->setPrenom('karmeni POST');
        $Auteur->setEmail('mayssa@karmeni.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($Auteur);
        $em->flush();

        return new View('autheur update Successfully', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/auteurs/{id}")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $result = $repo->find($id);

        if ($result === null) {
            return new View('ilya pas des auteurs avec cette id', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }
}
