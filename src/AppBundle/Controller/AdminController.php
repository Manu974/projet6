<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Imprimante;
use AppBundle\Entity\Cartouche;
use AppBundle\Entity\Commande;
use AppBundle\Entity\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Form\RegistrationType;
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
        $user = new User();

        $form   = $this->get('form.factory')->create(RegistrationType::class, $user);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $userManager = $this->get('fos_user.user_manager');
            $user->setEnabled(true);
            $userManager->updateUser($user);
            return $this->redirectToRoute("adminpage");
        }

        return $this->render('admin/addUser.html.twig', [
            "form" => $form->createView(),
            ]);

        
    }


    /**
     * @Route("/admin/user/edit/{id}", name="edituseradminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, $id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));

        $form = $this->get('form.factory')->create(RegistrationType::class, $user);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $userManager->updateUser($user);
            return $this->redirectToRoute("adminpage");
        }

         return $this->render('admin/addUser.html.twig', [
            "form" => $form->createView(),
            ]); 
    }

    /**
     * @Route("/admin/user/delete/{id}", name="deleteuseradminpage")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, $id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));

        // suppression du compte
        $userManager->deleteUser($user);

        return $this->redirectToRoute('adminpage');
    }
}
