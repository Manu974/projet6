<?php
// src/AppBundle/Services/Printer.php

namespace AppBundle\Services;

class Printer
{
	private $nbReplace;

	public function __construct($nbReplace)
	{
		$this->nbReplace = (int) $nbReplace;
	}

	public function initCartridges($printer)
	{
		$printer->setBlack($this->nbReplace);
        $printer->setRed($this->nbReplace);
        $printer->setCyan($this->nbReplace);	
	}

}