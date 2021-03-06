<?php

namespace ProjetL3\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\Range;

class ParametersAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection) {
        $collection
            ->remove('create')
            ->remove('delete')
        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
        $errorElement
            ->with('noteMax')
                ->addConstraint(new Range(array(
                    'min' => 1,
                    'max' => 5,
            )))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('noteMax')
            ->add('votesMax')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
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
            ->add('noteMax',null,array(
                'label' => 'Note avant envoi sur Twitter',
                'precision' => 1,
            ))
            ->add('votesMax',null,array(
                'label' => 'Nombre de votes avant envoi sur Twitter',
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('noteMax',null,array(
                'label' => 'Note avant envoi sur Twitter',
            ))
            ->add('votesMax',null,array(
                'label' => 'Nombre de votes avant envoi sur Twitter',
            ))
        ;
    }
}
