<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Imprimante;
use AppBundle\Form\CartoucheType;

class CartridgeController extends Controller
{
    /**
     * @Route("/cartridge", name="cartridgepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartouche')
        ;

        $cartridges = $repository->findAll();
        
        
        // replace this example code with whatever you need
        return $this->render('cartridge/index.html.twig', [
            "cartridges" => $cartridges,
        ]);
    }


    /**
     * @Route("/cartridge/add", name="addcartridgepage")
     */
    public function addAction(Request $request)
    {
        $cartridge = new Cartouche();
        $cartridge->setStatuscommande(false);
        $form = $this->get('form.factory')->create(CartoucheType::class, $cartridge);

       if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

          $em = $this->getDoctrine()->getManager();
         
          $em->persist($cartridge);
          $em->flush();

          $request->getSession()->getFlashBag()->add('message', 'Cartouche bien enregistrée.');

          return $this->redirectToRoute('cartridgepage');
        }   

        // replace this example code with whatever you need
        return $this->render('cartridge/add.html.twig', [
            "form" => $form->createView(),
        ]);
    }

/*
    
    public function editAction(Request $request, $id)
    {

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $printer = $repository->find($id);

        $form = $this->get('form.factory')->create(ImprimanteType::class, $printer);

       if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          
          $em->flush();

          $request->getSession()->getFlashBag()->add('message', 'Imprimante mise a jour.');

          return $this->redirectToRoute('printerpage');
        }   

        // replace this example code with whatever you need
        return $this->render('printer/add.html.twig', [
            "form" => $form->createView(),
        ]);
    }

   
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;
        
        $printer = $repository->find($id);
        
        $em->remove($printer);
        $em->flush();

        $request->getSession()->getFlashBag()->add('message', 'Imprimante mise a jour.');
        
        return $this->redirectToRoute('printerpage');
    }*/
}