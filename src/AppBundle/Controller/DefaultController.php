<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        extract(parent::indexAction($request));
        $hotTours = $this->getDoctrine()
            ->getRepository('AppBundle:Tours')
            ->findAll();

        return $this->render('default/index.html.twig', [
            // 'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'hotTours' => $hotTours,
        ]);
    }
}
