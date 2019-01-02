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
     * @Rest\Get("/auteur")
     */
    public function getAction()
    {
        $result = $this->getDoctrine()->getRepository(Auteur::class)->findAll();
        if ($result === null) {
            return new View(' pas de auteur ', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Post("/auteur")
     */
    public function addAutheur(Request $request)
    {
        $Auteur = new Auteur();
        $Auteur->setNom('lassoued POST');
        $Auteur->setPrenom('fatma POST');

        $Auteur->setEmail('lasdoued@gmail.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($Auteur);
        $em->flush();

        return new View(' ajouter avec succeé  ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/auteur/{id}")
     */
    public function updateLivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $Auteur = $repo->find($id);
        if ($Auteur == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $Auteur->setNom('Put lassoued');
        $Auteur->setPrenom('fatma POST');
        $Auteur->setEmail('lasdoued@gmail.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($Auteur);
        $em->flush();

        return new View('auteur modifier ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/auteur/{id}")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $result = $repo->find($id);

        if ($result === null) {
            return new View('id invalide ' , Response::HTTP_NOT_FOUND);
        }

        return $result;
    }
}
