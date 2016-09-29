<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CountriesController extends BaseController
{
	/**
     * @Route("/countries", name="countries_list")
     */
    public function indexAction(Request $request)
    {
        $continents = $this->getDoctrine()
                        ->getRepository('AppBundle:Continents')
                        ->findAll();

        return $this->render('countries/index.html.twig', [
        	'continents' => $continents
        ]);
    }

    /**
     * @Route("/countries/info/{id}", name="countries")
     */
    public function infoAction($id = null)
    {
        if (empty($id)) die();
        $country = $this->getDoctrine()
                        ->getRepository('AppBundle:Countries')
                        ->find($id);

        return $this->render('countries/info.html.twig', [
            'country' => $country
        ]);
    }
}
