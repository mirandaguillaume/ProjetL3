<?php

namespace ProjetL3\LienBundle\Form;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use ProjetL3\LienBundle\Entity\Lien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThemeChoiceType extends AbstractType
{

    private $liens_id;

    public function __construct(array $liens) {
        $this->liens_id = array();
        foreach($liens as $lien){
            $this->liens_id[] = $lien->getId();
        }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $liens_id = $this->liens_id;

        $builder->add('theme','genemu_jqueryselect2_entity',array(
            'class' => 'ProjetL3\ListeBundle\Entity\Liste',
            'label' => ' ',
            'query_builder' => function (EntityRepository $er) use ($liens_id) {
                    $qb = $er->createQueryBuilder('t')
                        ->innerJoin('t.liens','l');

                    $qb->where('l.id IN (:liens)')
                        ->setParameter('liens',$liens_id);
                    return $qb;
                },
            'empty_value' => 'Liste thématique à afficher',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetl3_lienbundle_theme_choice';
    }
}
