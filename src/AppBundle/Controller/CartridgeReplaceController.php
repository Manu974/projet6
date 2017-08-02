<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Imprimante;
use AppBundle\Form\CartoucheType;

class CartridgeReplaceController extends Controller
{
    /**
     * @Route("/replace/{id}/{slug}", name="cartridgereplace")
     */
    public function replaceAction(Request $request, $id, $slug)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $printer = $repository->find($id);

        if($slug == "black"){
            $printer->setBlack($printer->getBlack()+1);
        }

        if($slug == "red"){
            $printer->setRed($printer->getRed()+1);
        }

        if($slug == "cyan"){
            $printer->setCyan($printer->getCyan()+1);
        }

         $em = $this->getDoctrine()->getManager();
          
          $em->flush();

        return $this->redirectToRoute('printerpage');
    }

    /**
     * @Route("/replaceback/{id}/{slug}", name="cartridgereplaceback")
     */
    public function replaceBackAction(Request $request, $id, $slug)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Imprimante')
        ;

        $printer = $repository->find($id);

        if($slug == "black"){
            $printer->setBlack($printer->getBlack()-1);
        }

        if($slug == "red"){
            $printer->setRed($printer->getRed()-1);
        }

        if($slug == "cyan"){
            $printer->setCyan($printer->getCyan()-1);
        }

         $em = $this->getDoctrine()->getManager();
          
          $em->flush();

        return $this->redirectToRoute('printerpage');
    }

    /**
     * @Route("/take/{id}/", name="takecartridge")
     */
    public function takeCartridgeAction(Request $request, $id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartouche')
        ;

        $cartridge = $repository->find($id);

        $cartridge->setQuantite($cartridge->getQuantite()-1);

        $em = $this->getDoctrine()->getManager();
          
        $em->flush();

        return $this->redirectToRoute('cartridgepage');
    }

}