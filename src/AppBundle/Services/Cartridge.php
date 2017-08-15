<?php
// src/AppBundle/Services/Cartridge.php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManagerInterface;

class Cartridge
{
	private $em;

	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
	}

	public function findAllCartridges()
	{
		$repositoryCartouche = $this->em->getRepository('AppBundle:Cartouche');

        $cartridges = $repositoryCartouche->findAll();

       	return $cartridges;
	}

	public function findOneCartridge($id)
	{
		$repositoryCartouche = $this->em->getRepository('AppBundle:Cartouche');
		$cartridge = $repositoryCartouche->find($id);

		return $cartridge;
	}

	public function takeCartridge($id)
	{
		
		$cartridge = self::findOneCartridge($id);

		$cartridge->setQuantite($cartridge->getQuantite()-1);

		return $cartridge;	
	}

	public function depositCartridge($id)
	{
		$cartridge = self::findOneCartridge($id);

		$cartridge->setQuantite($cartridge->getQuantite()+1);

		return $cartridge;	
	}

	public function initCartridge($cartridge)
	{
		$cartridge->setStatuscommande(false);
        $cartridge->setReapprovisionnement(null);

        return $cartridge;	
	}
}