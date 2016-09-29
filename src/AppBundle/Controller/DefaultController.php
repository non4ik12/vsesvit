<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactForm;
use AppBundle\Form\Type\ContactformType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $hotTours = $this->getDoctrine()
            ->getRepository('AppBundle:Tours')
            ->findAll();

        return $this->render('default/index.html.twig', [
            'hotTours'    => $hotTours,
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction(Request $request)
    {
        return $this->render('default/contacts.html.twig');
    }
}
