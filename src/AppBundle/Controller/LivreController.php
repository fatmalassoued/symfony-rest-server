<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Livre;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class LivreController extends FOSRestController
{
    /**
     * @Rest\Get("/livre")
     */
    public function getAction()
    {
        $result = $this->getDoctrine()->getRepository(Livre::class)->findAll();
        if ($result === null) {
            return new View('livre invalid ', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Post("/livre")
     */
    public function addLivre(Request $request)
    {
        /*$livre = $request->get('livre');
        if(empty($livre) )
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_CREATED);
        }*/
        $Livre = new Livre();
        $Livre->setTitre('Ajout via POST');
        $Livre->setDescriptif('descriptif');
        $Livre->setISBN('fatma lassoued');
        $Livre->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($Livre);
        $em->flush();

        return new View('livre ajouter ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/livre/{id}")
     */
    public function updateLivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $Livre = $repo->find($id);
        if ($Livre == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $Livre->setTitre('fatma');
        $Livre->setDescriptif('Put descriptif');
        $Livre->setISBN('Put fatma');
        $Livre->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($Livre);
        $em->flush();

        return new View('livre modifier ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/livre/{titre}")
     */
    public function searchAction($titre)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $result = $repo->findOneByTitre($titre);
        if ($result === null) {
            return new View('livre non exsite ', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Get("/livre/{id}")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $result = $repo->find($id);
        if ($result === null) {
            return new View('livre non existe ', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Delete("/livre/{id}")
     */
    public function suprimmerlivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $Livre = $repo->find($id);
        if ($Livre == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $em->remove($Livre);
        $em->flush();

        return new View('livre supprimer ', Response::HTTP_CREATED);
    }
}
