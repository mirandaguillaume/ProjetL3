<?php

namespace ProjetL3\GroupeBundle\Form;

use Doctrine\ORM\EntityRepository;
use ProjetL3\UserBundle\Entity\User;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupeCreateType extends GroupeEditType
{

    private $current_user;

    public function __construct(User $current_user) {
        $this->current_user = $current_user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $current_user = $this->current_user;

        parent::buildForm($builder,$options);

        $builder
            ->add('users', 'genemu_jqueryselect2_entity', array(
                'class' => 'ProjetL3UserBundle:User',
                'query_builder' => function(EntityRepository $er) use ($current_user) {
                        return $er->createQueryBuilder('u')
                                  ->where('u.id <> ?1')
                                  ->setParameter(1,$current_user->getId());
                    },
                'property' => 'username',
                'multiple' => true,
                'configs' => array(
                    'placeholder' => 'Membres du groupe',
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
            'data_class' => 'ProjetL3\GroupeBundle\Entity\Groupe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_groupebundle_groupe_create';
    }
}
