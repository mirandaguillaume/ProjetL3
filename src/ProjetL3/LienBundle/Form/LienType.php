<?php

namespace ProjetL3\LienBundle\Form;

use ProjetL3\LienBundle\Entity\Lien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LienType extends AbstractType
{

    private $tags_existants;

    private $tags_selectionnes;

    public function __construct(Lien $lien,array $tags_existants) {
        $this->tags_existants = array();
        $this->tags_selectionnes = array();
        foreach($tags_existants as $tag) {
            $this->tags_existants[] = $tag->getNom();
        }
        if ((isset($lien))&&(count($lien->getTags())!=0)) {
            foreach($lien->getTags()->toArray() as $tag) {
                $this->tags_selectionnes [] = $tag;
            }
        }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom',null,array(
                'label' => 'Nom',
            ))
            ->add('url','url',array(
                'label' => 'URL',
            ))
            ->add('tags_form','genemu_jqueryselect2_hidden',array(
                'configs' => array(
                    'placeholder' => 'Tags du lien',
                    'width' => 200,
                    'tokenSeparators' => array(' ',','),
                    'tags' => $this->tags_existants,
                ),
                'label' => 'Tags'
            ))
            ->add('listes','genemu_jqueryselect2_entity',array(
                'class' => 'ProjetL3ListeBundle:Liste',
                'property' => 'nom',
                'multiple' => true,
                'configs' => array(
                    'placeholder' => 'Thèmes du lien',
                    'width' => 200,
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetL3\LienBundle\Entity\Lien'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_lien';
    }
}
