<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ToursController extends Controller
{
    /**
     * @Route("/tours/show/{id}", name="tour_info")
     */
    public function showAction($id)
    {
        if (empty($id)) {
            die();
        }

        $tour = $this->getDoctrine()
            ->getRepository('AppBundle:Tours')
            ->find($id);

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));
        $breadcrumbs->addItem($tour->continent->getTitle(), $this->get("router")->generate('continent_info', ['id' => $tour->getContinentId()]));
        $breadcrumbs->addItem($tour->country->getTitle(), $this->get("router")->generate('country_info', ['id' => $tour->getCountryId()]));
        $breadcrumbs->addItem($tour->city->getTitle(), $this->get("router")->generate('city_info', ['id' => $tour->getCityId()]));
        $breadcrumbs->addItem("City", $this->get("router")->generate('city_info', ['id' => $tour->getCityId()]));

        // Example without URL
        // $breadcrumbs->addItem("Some text without link");

        // Example with parameter injected into translation "user.profile"
        // $breadcrumbs->addItem($txt, $url, ["%user%" => $user->getName()]);

        return $this->render('tours/show.html.twig', [
            'tour' => $tour,
        ]);
    }
}
