<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Cartouche
 *
 * @ORM\Table(name="cartouche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartoucheRepository")
 */
class Cartouche
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
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reapprovisionnement", type="datetime", nullable=true)
     */
    private $reapprovisionnement;

    /**
     * @var bool
     *
     * @ORM\Column(name="statuscommande", type="boolean")
     */
    private $statuscommande;

    /**
    * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Imprimante", cascade={"persist"})
    */
    private $printers;

   


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
     * Set marque
     *
     * @param string $marque
     *
     * @return Cartouche
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Cartouche
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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Cartouche
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
     * Set modele
     *
     * @param string $modele
     *
     * @return Cartouche
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
     * Set reapprovisionnement
     *
     * @param \DateTime $reapprovisionnement
     *
     * @return Cartouche
     */
    public function setReapprovisionnement($reapprovisionnement)
    {
        $this->reapprovisionnement = $reapprovisionnement;

        return $this;
    }

    /**
     * Get reapprovisionnement
     *
     * @return \DateTime
     */
    public function getReapprovisionnement()
    {
        return $this->reapprovisionnement;
    }

    /**
     * Set statuscommande
     *
     * @param boolean $statuscommande
     *
     * @return Cartouche
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
     * Constructor
     */
    public function __construct()
    {
        $this->printers = new \Doctrine\Common\Collections\ArrayCollection();
        
    }

    /**
     * Add printer
     *
     * @param \AppBundle\Entity\Imprimante $printer
     *
     * @return Cartouche
     */
    public function addPrinter(\AppBundle\Entity\Imprimante $printer)
    {
        $this->printers[] = $printer;

        return $this;
    }

    /**
     * Remove printer
     *
     * @param \AppBundle\Entity\Imprimante $printer
     */
    public function removePrinter(\AppBundle\Entity\Imprimante $printer)
    {
        $this->printers->removeElement($printer);
    }

    /**
     * Get printers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrinters()
    {
        return $this->printers;
    }

}
