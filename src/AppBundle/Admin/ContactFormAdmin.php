<?php

namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ContactFormAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('userEmail', 'text', [
                'attr' => [
                    'readonly' => true,
                ],
            ])
            ->add('created', DateTimeType::class, [
                'widget' => 'single_text',
                'attr'   => [
                    'readonly' => true,
                ],
                'format' => 'dd.MM.yyyy H:m:s',
            ])
            ->add('content', CKEditorType::class, [
                'config' => [
                    'uiColor' => '#ffffff',
                ],
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('userEmail');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('userEmail')
            ->addIdentifier('content')
            ->addIdentifier('created', 'datetime');
    }
}
