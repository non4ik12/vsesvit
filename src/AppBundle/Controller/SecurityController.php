<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseSecurityController
{
	/**
     * @Route("/sslogin", name="sslogin")
     */
    // public function loginAction(Request $request)
    // {
    // 	// die('Lol');
    //     $response = parent::loginAction($request);

    //     // ... do custom stuff
    //     return $response;
    // }

    // protected function renderLogin(array $data)
    // {
    //     return $this->render('security/login.html.twig', $data);
    // }

}