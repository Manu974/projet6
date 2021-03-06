<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('roles', ChoiceType::class, [
            'choices'  => [
                "Utilisateur" => "ROLE_USER",
                "Administrateur" => "ROLE_ADMIN",
                "Super-Admin" => "ROLE_SUPER_ADMIN",
            ],
            'multiple' => true,
        ])
        ->add('save', SubmitType::class, [

            'label' => 'Valider',
        ]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}
