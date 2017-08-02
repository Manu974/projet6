<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrinterController extends Controller
{
    /**
     * @Route("/printer", name="printerpage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $printers = $repository->findAll();

        // replace this example code with whatever you need
        return $this->render('printer/index.html.twig', [
            "printers" => $printers,
        ]);
    }
}
