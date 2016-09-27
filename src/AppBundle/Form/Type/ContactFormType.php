<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                    'label_attr' => [
                        'class' => 'control-label'
                    ],
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ])
            ->add('userEmail', EmailType::class, [
                    'label_attr' => [
                        'class' => 'control-label'
                    ],
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ])
            ->add('save', SubmitType::class, [
                    'label' => 'Create Post',
                    'attr'  => [
                        'class' => 'btn btn-success'
                    ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ContactForm'
        ));
    }

    public function getName()
    {
    	return 'contactForm';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults([
    		'data_class' => 'AppBundle\Entity\ContactForm'
    	]);
    }
}