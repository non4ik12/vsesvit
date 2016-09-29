<?php

namespace AppBundle\Form\Type;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'attr'       => [
                    'class' => 'form-control',
                    'placeholder' => 'Напишите здесь Ваш вопрос',
                ],
                'label' => false
            ])
            ->add('userEmail', EmailType::class, [
                'attr'       => [
                    'class'       => 'form-control',
                    'placeholder' => 'Ваш E-mail',
                ],
                'label' => false,
            ])
            ->add('captcha', CaptchaType::class, [
                'label'  => false,
                'width'  => 300,
                'reload' => true,
                'as_url' => true,
                'attr'   => [
                    'class' => 'form-control',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Отправить',
                'attr'  => [
                    'class' => 'btn btn-success',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ContactForm',
        ));
    }

    public function getName()
    {
        return 'contactform';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\ContactForm',
        ]);
    }
}
