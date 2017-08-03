<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Imprimante;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
          $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $printers = $repository->findAll();
        $numberPrinters = $repository->numberPrinters();
       
        // replace this example code with whatever you need
        return $this->render('home/index.html.twig', [

            "printers" => $printers,
            "numberPrinters" => $numberPrinters,
        ]);
    }
}
