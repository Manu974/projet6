<?php
// src/AppBundle/Services/Commande.php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManagerInterface;

class Commande
{
	private $em;

	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
	}

	public function findAllCommandes()
	{
		$repositoryCommande = $this->em->getRepository('AppBundle:Commande');

        $commandes = $repositoryCommande->findAll();

       	return $commandes;
	}

	public function findSpecificCommandes($id)
	{
		$repositoryCommande = $this->em->getRepository('AppBundle:Commande');

		$commandes = $repositoryCommande->findBy(['cartouche' => $id]);

		return $commandes; 
	}

	public function initCommande($commande, $cartridge)
	{
		$commande->setType($cartridge->getType());
        $commande->setModele($cartridge->getModele());
        $commande->setDatedelivraison(null);

        return $commande;
	}
}