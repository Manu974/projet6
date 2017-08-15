<?php
// src/AppBundle/Services/Printer.php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManagerInterface;

class Printer
{
	private $nbReplace;
	private $em;

	public function __construct($nbReplace, EntityManagerInterface $em)
	{
		$this->nbReplace = (int) $nbReplace;
		$this->em = $em;
	}

	public function initCartridges($printer)
	{
		$printer->setBlack($this->nbReplace);
        $printer->setRed($this->nbReplace);
        $printer->setCyan($this->nbReplace);	
	}

	public function findAllPrinters()
	{
		$repositoryImprimante = $this->em->getRepository('AppBundle:Imprimante');

        $printers = $repositoryImprimante->findAll();

       	return $printers;
	}

	public function numberOfPrinters()
	{
		$repositoryImprimante = $this->em->getRepository('AppBundle:Imprimante');
		$numberPrinters = $repositoryImprimante->numberPrinters();

		return $numberPrinters;

	}

	public function findOnePrinter($id)
	{
		$repositoryImprimante = $this->em->getRepository('AppBundle:Imprimante');
		$printer = $repositoryImprimante->find($id);

		return $printer;
	}

	public function replaceCartridge($id, $slug)
	{
		$repositoryImprimante = $this->em->getRepository('AppBundle:Imprimante');
		$printer= self::findOnePrinter($id);

		if($slug == "black"){
            $printer->setBlack($printer->getBlack()+1);
        }

        if($slug == "red"){
            $printer->setRed($printer->getRed()+1);
        }

        if($slug == "cyan"){
            $printer->setCyan($printer->getCyan()+1);
        }

        return $printer;
	}

	public function replaceBackCartridge($id, $slug)
	{
		$repositoryImprimante = $this->em->getRepository('AppBundle:Imprimante');
		$printer= self::findOnePrinter($id);

		
        if($slug == "black"){
            $printer->setBlack($printer->getBlack()-1);
        }

        if($slug == "red"){
            $printer->setRed($printer->getRed()-1);
        }

        if($slug == "cyan"){
            $printer->setCyan($printer->getCyan()-1);
        }

        return $printer;
	}

}
