<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Imprimante;
use AppBundle\Entity\Cartouche;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
          $repositoryImprimante = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $repositoryCartouche = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartouche')
        ;

        $printers = $repositoryImprimante->findAll();
        $numberPrinters = $repositoryImprimante->numberPrinters();

        $cartridges = $repositoryCartouche->findAll();
       
        // replace this example code with whatever you need
        return $this->render('home/index.html.twig', [

            "printers" => $printers,
            "cartridges" => $cartridges,
            "numberPrinters" => $numberPrinters,
        ]);
    }
}
