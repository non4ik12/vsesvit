<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CitiesController extends Controller
{
    /**
     * @Route("/city/show/{id}", name="city_info")
     */
    public function showAction($id)
    {
        if (empty($id)) {
            die();
        }

        $city = $this->getDoctrine()
            ->getRepository('AppBundle:Cities')
            ->find($id);

        return $this->render('cities/show.html.twig', [
            'city' => $city,
        ]);
    }

}
