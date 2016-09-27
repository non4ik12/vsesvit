<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\ContactForm;
use AppBundle\Form\Type\ContactFormType;
use Doctrine\Common\Util\Debug;

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

        $contactData = new ContactForm();
        $contactForm = $this->createForm(ContactFormType::class, $contactData);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            // exit(Debug::dump($contactData));
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $contactData = $contactForm->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactData);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/index.html.twig', [
            'hotTours'    => $hotTours,
            'contactForm' => $contactForm->createView(),
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
