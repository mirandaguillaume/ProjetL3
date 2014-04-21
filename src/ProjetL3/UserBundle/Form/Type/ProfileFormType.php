<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 12/02/14
 * Time: 13:48
 */

namespace ProjetL3\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('nom',null,array(
                'label'=>'Nom :'
            ))
            ->add('prenom',null,array(
                'label'=>'Prénom :'
            ))
            ->add('freqActu','choice',array(
                'choices' => array(
                    'null' => 'Pas de newsletter',
                    'semaine' => 'Hebdomadaire',
                    'jour' => 'Quotidienne',
                ),
                'label' => 'Fréquence d\'envoi de la newsletter',
            ))
        ;
    }

    public function getName()
    {
        return 'projetl3_user_profile';
    }
} 