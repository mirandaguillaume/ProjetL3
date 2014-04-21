<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 11/02/14
 * Time: 15:02
 */

namespace ProjetL3\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;


class RegistrationFormType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('freqActu','choice',array(
                'choices' => array(
                    'jour' => 'Quotidienne',
                    'semaine' => 'Hebdomadaire',
                    'aucune' => 'Pas de newsletter'
                ),
                'expanded' => true,
                'label' => 'Fréquence de réception de la newsletter'
            ))
            ;
    }

    public function getName()
    {
        return 'projetl3_user_registration';
    }
} 