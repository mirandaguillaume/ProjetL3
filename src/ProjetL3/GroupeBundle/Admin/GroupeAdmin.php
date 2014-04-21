<?php

namespace ProjetL3\GroupeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class GroupeAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
            ->add('users',null,array(
                'label' => 'Membres',
            ),null,array(
                'multiple' => true,
            ))
            ->add('admins',null,array(
                'label' => 'Administrateurs',
            ),null,array(
                'multiple' => true,
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
            ->add('users',null,array(
                'label' => 'Membres',
            ))
            ->add('admins',null,array(
                'label' => 'Administrateurs',
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
            ->add('users',null,array(
                'label' => 'Membres',
            ))
            ->add('admins',null,array(
                'label' => 'Administrateurs',
            ))
        ;
    }
}
