<?php

namespace ProjetL3\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username',null,array(
                'label' => 'Pseudo',
            ),null,array())
            ->add('email',null,array(
                'label' => 'E-mail',
            ))
            ->add('roles','doctrine_orm_choice', array(
                'choices' => array(
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur',
                    'ROLE_SUPER_ADMIN' => 'Super-administrateur',
                ),
                'multiple' => true,
                'label' => 'Rôles',
            ))
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
            ->add('prenom',null,array(
                'label' => 'Prénom',
            ))
            ->add('freqActu','doctrine_orm_choice', array(
                'choices' => array(
                    'jour' => 'Quotidienne',
                    'semaine' => 'Hebdomadaire',
                    'aucune' => 'Aucune newsletter',
                ),
                'label' => 'Fréquence de réception de la newsletter',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username','text',array(
                'label' => 'Pseudo',
            ))
            ->add('email','text',array(
                'label' => 'E-mail',
            ))
            ->add('roles','choice',array(
                'choices' => array(
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur',
                    'ROLE_SUPER_ADMIN' => 'Super-administrateur',
                ),
                'multiple' => true,
                'label' => 'Rôles',
            ))
            ->add('nom','text',array(
                'label' => 'Nom',
            ))
            ->add('prenom','text',array(
                'label' => 'Prénom',
            ))
            ->add('freqActu','choice',array(
                'choices' => array(
                    'jour' => 'Quotidienne',
                    'semaine' => 'Hebdomadaire',
                    'aucune' => 'Aucune newsletter',
                ),
                'label' => 'Fréquence de réception de la newsletter',
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
            ->add('username','text',array(
                'label' => 'Pseudo',
            ))
            ->add('email','text',array(
                'label' => 'Email',
            ))
            ->add('roles','choice',array(
                'choices' => array(
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur',
                    'ROLE_SUPER_ADMIN' => 'Super-administrateur',
                ),
                'multiple' => true,
                'label' => 'Rôles',
            ))
            ->add('nom','text',array(
                'label' => 'Nom',
            ))
            ->add('prenom','text',array(
                'label' => 'Prenom',
            ))
            ->add('freqActu','choice',array(
                'label' => 'Reception de newsletter',
                'choices' => array(
                    'jour' => 'Quotidienne',
                    'semaine' => 'Hebdomadaire',
                    'aucune' => 'Aucune newsletter',
                ),
                'expanded' => true,
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username','text',array(
                'label' => 'Pseudo',
            ))
            ->add('email')
            ->add('roles','choice',array(
                'choices' => array(
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur',
                    'ROLE_SUPER_ADMIN' => 'Super-administrateur',
                ),
                'multiple' => true,
                'label' => 'Rôles',
            ))
            ->add('nom')
            ->add('prenom')
            ->add('freqActu','choice',array(
                'label' => 'Fréquence de réception des newsletters',
                'choices' => array(
                    'jour' => 'Quotidienne',
                    'semaine' => 'Hebdomadaire',
                    'aucune' => 'Aucune newsletter',
                ),
            ))
        ;
    }
}
