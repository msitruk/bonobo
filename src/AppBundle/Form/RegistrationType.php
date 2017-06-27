<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('age');
        // $builder->add('famille');
        $builder->add('famille', EntityType::class, array(
            // query choices from this entity
            'class' => 'AppBundle:Famille',

            // use the User.username property as the visible option string
            'choice_label' => 'name',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ));
        $builder->add('race', EntityType::class, array(
            // query choices from this entity
            'class' => 'AppBundle:Race',

            // use the User.username property as the visible option string
            'choice_label' => 'name',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ));
        $builder->add('food', EntityType::class, array(
            // query choices from this entity
            'class' => 'AppBundle:Food',

            // use the User.username property as the visible option string
            'choice_label' => 'name',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}