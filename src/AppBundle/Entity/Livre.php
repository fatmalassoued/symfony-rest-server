<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre.
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="IDX_AC634F9960BB6FE6", columns={"auteur_id"})})
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="string", length=255, nullable=false)
     */
    private $descriptif;
    /**
     * @var string
     *
     * @ORM\Column(name="ISBN", type="string", length=255, nullable=false)
     */
    private $ISBN;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var \Auteur
     *
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     * })
     */
    private $auteur;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set ISBN.
     *
     * @param string $ISBN
     *
     * @return Livre
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get ISBN.
     *
     * @return string
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set descriptif.
     *
     * @param string $descriptif
     *
     * @return Livre
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif.
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Livre
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set auteur.
     *
     * @param \AppBundle\Entity\Auteur $auteur
     *
     * @return Livre
     */
    public function setAuteur(\AppBundle\Entity\Auteur $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur.
     *
     * @return \AppBundle\Entity\Auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}
