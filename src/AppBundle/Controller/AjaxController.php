<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ContactformType;

class AjaxController extends Controller
{
    /**
     * @Route("/ajax/sendQuestion")
     */
    public function sendQuestionAction(Request $request)
    {
        $contactData = new ContactForm();
        $contactForm = $this->createForm(ContactformType::class, $contactData);
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactData);
            $em->flush();
            $response = [
                'success' => true,
                'message' => 'Ваш вопрос успешно отправлен. Пожалуйста, ожидайте, когда с Вами свяжется наш менеджер.',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Ошибка при сохранении вопроса. Пожалуйста, попробуйте позже.',
            ];
        }
        return new JsonResponse($response);
    }

}
