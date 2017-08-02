<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imprimante
 *
 * @ORM\Table(name="imprimante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImprimanteRepository")
 */
class Imprimante
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
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseip", type="string", length=15)
     */
    private $adresseip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateachat", type="datetime")
     */
    private $dateachat;

    /**
     * @var int
     *
     * @ORM\Column(name="garantie", type="smallint")
     */
    private $garantie;

    public function __construct()
    {
    $this->dateachat = new \Datetime('now');
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
     * Set marque
     *
     * @param string $marque
     *
     * @return Imprimante
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
     * Set modele
     *
     * @param string $modele
     *
     * @return Imprimante
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
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Imprimante
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Imprimante
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
     * Set adresseip
     *
     * @param string $adresseip
     *
     * @return Imprimante
     */
    public function setAdresseip($adresseip)
    {
        $this->adresseip = $adresseip;

        return $this;
    }

    /**
     * Get adresseip
     *
     * @return string
     */
    public function getAdresseip()
    {
        return $this->adresseip;
    }

    /**
     * Set dateachat
     *
     * @param \DateTime $dateachat
     *
     * @return Imprimante
     */
    public function setDateachat($dateachat)
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    /**
     * Get dateachat
     *
     * @return \DateTime
     */
    public function getDateachat()
    {
        return $this->dateachat;
    }

    /**
     * Set garantie
     *
     * @param integer $garantie
     *
     * @return Imprimante
     */
    public function setGarantie($garantie)
    {
        $this->garantie = $garantie;

        return $this;
    }

    /**
     * Get garantie
     *
     * @return int
     */
    public function getGarantie()
    {
        return $this->garantie;
    }
}

