<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RubricsController extends BaseController
{
	/**
     * @Route("/rubrics", name="rubrics")
     */
    public function indexAction(Request $request)
    {
        return $this->render('rubrics/index.html.twig');
    }
}
