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
         $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Cartouche')
        ;

        $cartridge = $repository->find($id);

        $form = $this->get('form.factory')->create(CommandeType::class, $commande);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $cartridge->setStatuscommande(true);
            $commande->setStatuscommande(false);
            $commande->setCartouche($cartridge);

            $em = $this->getDoctrine()->getManager();

            $em->persist($commande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('message', 'Commande enregistrée');

            return $this->redirectToRoute('cartridgepage');
        }

       
        
        
        // replace this example code with whatever you need
        return $this->render('commande/commande.html.twig', [
            "cartridge" => $cartridge,
            "form" => $form->createView(),
        ]);
    }

}