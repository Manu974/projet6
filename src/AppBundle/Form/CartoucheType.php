<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CartoucheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class)
            ->add('type', ChoiceType::class, [
                 'choices'  => array(
                        "Laser noir" => "Laser noir",
                        "Laser rouge" => "Laser rouge",
                        "Laser cyan" => "Laser cyan",
                        "Jet d'encre noir" => "Jet d'encre noir",
                        "Jet d'encre rouge" => "Jet d'encre rouge",
                        "Jet d'encre cyan" => "Jet d'encre cyan",
                    ),
                ])
            ->add('quantite', IntegerType::class)
            ->add('modele', TextType::class)
            ->add('printers', EntityType::class, [
                'class'        => 'AppBundle:Imprimante',
                'label'        => "Modele d'imprimante",
                'choice_label' => 'modele',
                'multiple'     => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Valider'
                ])
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cartouche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cartouche';
    }


}
