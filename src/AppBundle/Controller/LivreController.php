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
     * @Rest\Get("/books")
     */
    public function getAction()
    {
        $result = $this->getDoctrine()->getRepository(Livre::class)->findAll();
        if ($result === null) {
            return new View('there are no books', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Post("/books")
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
        $Livre->setISBN('mayssa karmeni');
        $Livre->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($Livre);
        $em->flush();

        return new View('livre ajouté avec succé ', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/books/{id}")
     */
    public function updateLivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $Livre = $repo->find($id);
        if ($Livre == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $Livre->setTitre('mayssa');
        $Livre->setDescriptif('Put descriptif');
        $Livre->setISBN('Put mayssa');
        $Livre->setDate(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($Livre);
        $em->flush();

        return new View('livre update avec succeé', Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/books/{titre}")
     */
    public function searchAction($titre)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $result = $repo->findOneByTitre($titre);
        if ($result === null) {
            return new View('there are no books with this title', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Get("/book/{id}")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $result = $repo->find($id);
        if ($result === null) {
            return new View('there are no books with this id', Response::HTTP_NOT_FOUND);
        }

        return $result;
    }

    /**
     * @Rest\Delete("/books/{id}")
     */
    public function deletebook(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $Livre = $repo->find($id);
        if ($Livre == null) {
            return new View('NULL VALUES ARE NOT ALLOWED', Response::HTTP_NOT_CREATED);
        }
        $em->remove($Livre);
        $em->flush();

        return new View('book deleted Successfully', Response::HTTP_CREATED);
    }
}
