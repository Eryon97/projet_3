<?php

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserTypeAdmin extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class)
        ->add('password', RepeatedType::class, array(
            'type'            => PasswordType::class,
            'invalid_message' => 'Les mots de passe doivent etre identiques.',
            'options'         => array('required' => true),
            'first_options'   => array('label' => 'Mot de passe'),
            'second_options'  => array('label' => 'Rappel mot de passe'),
        ))
        ->add('role', ChoiceType::class, array(
            'choices' => array('Admin' =>'ROLE_ADMIN', 'User' => 'ROLE_USER')
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
