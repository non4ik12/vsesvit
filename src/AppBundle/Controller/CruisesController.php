<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class CruisesController extends BaseController
{
	/**
     * @Route("/cruises", name="cruises")
     */
    public function indexAction(Request $request)
    {
        return $this->render('cruises/index.html.twig');
    }
}
