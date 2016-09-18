<?php

namespace AppBundle\Controller;

// use AppBundle\Entity\Countries;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CountriesController extends BaseController
{
	/**
     * @Route("/countries", name="countries_list")
     */
    public function indexAction(Request $request)
    {
        extract(parent::indexAction($request));
        $countries = $this->getDoctrine()
        	->getRepository('AppBundle:Countries')
        	->findAll();

        return $this->render('countries/index.html.twig', [
        	'countries' => $countries
        ]);
    }
}
