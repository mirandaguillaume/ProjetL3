<?php

namespace ProjetL3\LienBundle\Form;

use Doctrine\ORM\EntityRepository;
use ProjetL3\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupeChoiceType extends AbstractType
{

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $user = $this->user;

        $builder
            ->add('groupes','genemu_jqueryselect2_entity',array(
                'configs' => array(
                    'placeholder' => 'Choisir un groupe',
                    'width' => 200,
                ),
                'label' => 'Groupes',
                'class' => 'ProjetL3\GroupeBundle\Entity\Groupe',
                'data_class' => 'ProjetL3\GroupeBundle\Entity\Groupe',
                'query_builder' => function (EntityRepository $er) use ($user) {

                        return $er->createQueryBuilder('g2')
                                  ->from('ProjetL3GroupeBundle:Groupe','g')
                                  ->innerJoin('g.users','u')
                                  ->where('u.id = ?1')
                                  ->setParameter(1,$user->getId())
                            ;
                    }
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_groupe_choix';
    }
}
