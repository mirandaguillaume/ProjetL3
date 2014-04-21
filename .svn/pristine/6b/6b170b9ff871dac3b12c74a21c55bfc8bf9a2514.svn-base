<?php

namespace ProjetL3\LienBundle\Form;

use Doctrine\ORM\EntityManager;
use ProjetL3\LienBundle\Entity\Lien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TriType extends AbstractType
{

    private $fields_names;

    public function __construct(EntityManager $em) {
        $this->fields_names = $em->getClassMetadata('ProjetL3\LienBundle\Entity\Lien')->getFieldNames();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach($this->fields_names as $field_name) {
            if (($field_name != 'id') && ($field_name != 'desc')) {
                $builder->add($field_name.'_opt','choice',array(
                    'label' => $field_name,
                    'choices' => array(
                        'None' => 'Pas de tri',
                        'ASC' => 'Croissant',
                        'DESC' => 'Décroissant',
                    )
                ));
            }
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_tri';
    }
}
