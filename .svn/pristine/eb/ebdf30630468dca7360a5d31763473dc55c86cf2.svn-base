<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 09/03/14
 * Time: 08:12
 */

namespace ProjetL3\GroupeBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupeEditType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom','text')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetL3\GroupeBundle\Entity\Groupe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_groupebundle_groupe_edit';
    }

} 