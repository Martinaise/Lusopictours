<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'votre adresse mail',
                'disabled' => true,
            ])

            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'disabled' => true,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'disabled' => true,
            ])

            ->add('old_password', PasswordType::class, [
                // pour  ne pas chercher le old_password dans le user.php on utilise mapped
                'mapped' => false,
                'label' => 'Le mot de passe actuel',
                'attr' => [
                    'placeholder' => 'veuillez saisir votre mot de passe actuel'
                ]

            ])

            ->add('new_password', RepeatedType::class, [
                // pour cacher le mot de passe
                'type' => PasswordType::class,
                // pour  ne pas chercher le new_password dans le user.php on utilise mapped
                'mapped' => false,
                // pour rendre le mot de passe obligatoire
                'required' => true,

                'first_options' => [
                    'label' => 'votre nouveau mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de saisir votre mot de passe.'
                    ]

                ],

                'second_options' => [
                    'label' => 'Confirmez votre mot de passe',
                    // attr= attribut pour fair le placeholder
                    'attr' => [
                        'placeholder' => 'Merci de confirmer votre mot de passe.'

                    ]
                ]

            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Mettre à jour'

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
