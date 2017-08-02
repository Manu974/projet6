<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Imprimante;
use AppBundle\Form\ImprimanteType;

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


    /**
     * @Route("/printer/add", name="addprinterpage")
     */
    public function addAction(Request $request)
    {
        $printer = new Imprimante();

        $form = $this->get('form.factory')->create(ImprimanteType::class, $printer);

       if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($printer);
          $em->flush();

          $request->getSession()->getFlashBag()->add('message', 'Imprimante bien enregistrée.');

          return $this->redirectToRoute('printerpage');
        }   

        // replace this example code with whatever you need
        return $this->render('printer/add.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}
