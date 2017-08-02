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
                        "Laser monochrome" => "Laser monochrome",
                        "Laser couleur" => "Laser couleur",
                        "Jet d'encre monochrome" => "Jet d'encre monochrome",
                        "Jet d'encre couleur" => "Jet d'encre couleur",
                    ),
                ])
            ->add('quantite', IntegerType::class)
            ->add('modele', TextType::class)
            ->add('reapprovisionnement', DateType::class)
            ->add('printers')
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
