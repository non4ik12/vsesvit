<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class CountriesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('title', 'text')
            // ->add('description', 'textarea')
            ->add('description', CKEditorType::class, [
                'config' => [
                    'uiColor' => '#ffffff',
                ]
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('title');
    }
}