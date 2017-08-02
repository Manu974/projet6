<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedecommande", type="datetime")
     */
    private $datedecommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedelivraison", type="datetime", nullable=true)
     */
    private $datedelivraison;

    /**
     * @var bool
     *
     * @ORM\Column(name="statuscommande", type="boolean")
     */
    private $statuscommande;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cartouche", cascade={"persist"})
    */
    private $cartouche;


    /**
     * Constructor
     */
    public function __construct()
    {
        
        $this->datedecommande = new \DateTime('now');
        $this->datedelivraison = new \DateTime('now');
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Commande
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set modele
     *
     * @param string $modele
     *
     * @return Commande
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Commande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set datedecommande
     *
     * @param \DateTime $datedecommande
     *
     * @return Commande
     */
    public function setDatedecommande($datedecommande)
    {
        $this->datedecommande = $datedecommande;

        return $this;
    }

    /**
     * Get datedecommande
     *
     * @return \DateTime
     */
    public function getDatedecommande()
    {
        return $this->datedecommande;
    }

    /**
     * Set datedelivraison
     *
     * @param \DateTime $datedelivraison
     *
     * @return Commande
     */
    public function setDatedelivraison($datedelivraison)
    {
        $this->datedelivraison = $datedelivraison;

        return $this;
    }

    /**
     * Get datedelivraison
     *
     * @return \DateTime
     */
    public function getDatedelivraison()
    {
        return $this->datedelivraison;
    }

    /**
     * Set statuscommande
     *
     * @param boolean $statuscommande
     *
     * @return Commande
     */
    public function setStatuscommande($statuscommande)
    {
        $this->statuscommande = $statuscommande;

        return $this;
    }

    /**
     * Get statuscommande
     *
     * @return bool
     */
    public function getStatuscommande()
    {
        return $this->statuscommande;
    }

    /**
     * Set cartouche
     *
     * @param \AppBundle\Entity\Cartouche $cartouche
     *
     * @return Commande
     */
    public function setCartouche(\AppBundle\Entity\Cartouche $cartouche = null)
    {
        $this->cartouche = $cartouche;

        return $this;
    }

    /**
     * Get cartouche
     *
     * @return \AppBundle\Entity\Cartouche
     */
    public function getCartouche()
    {
        return $this->cartouche;
    }
}
