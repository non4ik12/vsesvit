<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class VisasController extends BaseController
{
    /**
     * @Route("/visas", name="visas")
     */
    public function contactsAction(Request $request)
    {
        return $this->render('visas/index.html.twig');
    }
}
