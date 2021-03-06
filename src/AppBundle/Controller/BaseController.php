<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactForm;
use AppBundle\Form\ContactType;
use AppBundle\Form\Type\ContactformType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    public function getContactFormAction()
    {
        $contactData = new ContactForm();
        $contactForm = $this->createForm(ContactformType::class, $contactData);
        return $this->render('contact_form.html.twig', ['form' => $contactForm->createView()]);
    }

    public function getDmChatAction()
    {
        $contactData = new ContactForm();
        $contactForm = $this->createForm(ContactformType::class, $contactData);
        return $this->render('dmchats/user_form.html.twig', ['form' => $contactForm->createView()]);
    }

    public function getDmChatAdminAction()
    {
        $contactData = new ContactForm();
        $contactForm = $this->createForm(ContactformType::class, $contactData);
        return $this->render('dmchats/admin_form.html.twig', ['form' => $contactForm->createView()]);
    }

}

