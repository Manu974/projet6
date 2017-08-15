<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Imprimante;
use AppBundle\Form\Type\CartoucheType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CartridgeReplaceController extends Controller
{
    /**
    * @Route("/replace/{id}/{slug}", name="cartridgereplace")
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function replaceAction(Request $request, $id, $slug)
    {
        $printer = $this->container->get('app.printer')->replaceCartridge($id, $slug);

        $em = $this->getDoctrine()->getManager();

        $em->flush();

        return $this->redirectToRoute('printerpage');
    }

    /**
    * @Route("/replaceback/{id}/{slug}", name="cartridgereplaceback")
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function replaceBackAction(Request $request, $id, $slug)
    {
        $printer = $this->container->get('app.printer')->replaceBackCartridge($id, $slug);

        $em = $this->getDoctrine()->getManager();

        $em->flush();

        return $this->redirectToRoute('printerpage');
    }

    /**
    * @Route("/take/{id}/", name="takecartridge")
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function takeCartridgeAction(Request $request, $id)
    {
        $cartridge = $this->container->get('app.cartridge')->takeCartridge($id);

        $em = $this->getDoctrine()->getManager();

        $em->flush();

        return $this->redirectToRoute('cartridgepage');
    }

    /**
    * @Route("/deposit/{id}/", name="depositcartridge")
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function depositCartridgeAction(Request $request, $id)
    {
       
        $cartridge = $this->container->get('app.cartridge')->depositCartridge($id);
        $em = $this->getDoctrine()->getManager();

        $em->flush();

        return $this->redirectToRoute('cartridgepage');
    }

}
