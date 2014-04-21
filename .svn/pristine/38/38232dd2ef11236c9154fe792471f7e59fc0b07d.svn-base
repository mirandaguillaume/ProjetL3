<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 27/03/14
 * Time: 04:41
 */

namespace ProjetL3\LienBundle\Form;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TagChoiceType extends AbstractType{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('tags','genemu_jqueryselect2_entity',array(
            'label' => ' ',
            'multiple' => true,
            'class' => 'ProjetL3\TagBundle\Entity\Tag',
            'configs' => array(
                'width' => '200px',
                'placeholder' => 'Tags à filtrer',
            ),
        ));

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_tag_choice';
    }
} 