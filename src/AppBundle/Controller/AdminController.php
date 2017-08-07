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

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="adminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');

        $users = $userManager->findUsers();

       
        // replace this example code with whatever you need
        return $this->render('admin/index.html.twig', [
            "users" => $users,
            ]);
    }


    /**
     * @Route("/admin/user/add", name="adduseradminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction(Request $request)
    {
        
    }


    /**
     * @Route("/admin/user/{id}", name="edituseradminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, $id)
    {

       
    }

    /**
     * @Route("/admin/user/{id}", name="deleteuseradminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, $id)
    {
        
    }
}
