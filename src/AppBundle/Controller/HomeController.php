<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Imprimante;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Commande;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class HomeController extends Controller
{
    /**
    * @Route("/", name="homepage")
    * @Security("has_role('ROLE_USER')")
    */
    public function indexAction(Request $request)
    {
        
        $printers = $this->container->get('app.printer')->findAllPrinters();
        $numberPrinters = $this->container->get('app.printer')->numberOfPrinters();

        $cartridges = $this->container->get('app.cartridge')->findAllCartridges();

        $commandes = $this->container->get('app.commande')->findAllCommandes();

        return $this->render('home/index.html.twig', [
            "printers" => $printers,
            "cartridges" => $cartridges,
            "numberPrinters" => $numberPrinters,
            "commandes" => $commandes,
        ]);
    }
}
