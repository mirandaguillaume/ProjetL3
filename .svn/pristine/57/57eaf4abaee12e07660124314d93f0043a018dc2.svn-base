<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 22/03/14
 * Time: 16:08
 */

namespace ProjetL3\LienBundle\Form;


use ProjetL3\LienBundle\Entity\Lien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NotationType extends AbstractType {

    private $lien;

    public function __construct(Lien $lien) {
        $this->lien = $lien;
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('note','genemu_jqueryrating',array(
                'label' => 'Note',
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_lien';
    }
} 