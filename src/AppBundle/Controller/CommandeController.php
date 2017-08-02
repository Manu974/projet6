<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Imprimante;
use AppBundle\Form\CartoucheType;
use AppBundle\Entity\Commande;
use AppBundle\Form\CommandeType;

class CommandeController extends Controller
{
    /**
     * @Route("/cartridge/commande/{id}", name="commandecartridgepage")
     */
    public function commandeAction(Request $request, $id)
    {
        $commande = new Commande();

        $form = $this->get('form.factory')->create(CommandeType::class, $commande);

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartouche')
        ;

        $cartridge = $repository->find($id);
        
        
        // replace this example code with whatever you need
        return $this->render('commande/commande.html.twig', [
            "cartridge" => $cartridge,
            "form" => $form->createView(),
        ]);
    }

}