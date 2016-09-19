<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ContinentsController extends BaseController
{
	/**
     * @Route("/continents", name="continents")
     */
    public function indexAction(Request $request)
    {
        extract(parent::indexAction($request));

        $continents = $this->getDoctrine()
                        ->getRepository('AppBundle:Continents')
                        ->findAll();

        return $this->render('countries/index.html.twig', [
        	'continents' => $continents
        ]);
    }

	/**
     * @Route("/continents/info/{id}", name="continents")
     */
    public function infoAction($id = null)
    {
    	if (empty($id)) die();
        $continent = $this->getDoctrine()
                        ->getRepository('AppBundle:Continents')
                        ->find($id);

        return $this->render('continents/info.html.twig', [
        	'continent' => $continent
        ]);
    }
}
