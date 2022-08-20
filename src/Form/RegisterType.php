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
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nom',TextType::class,[
                'label' => 'nom',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre nom'
                ]
                ])
            ->add('prenom',TextType::class,[
                'label' => ' prénom',
                'constraints'=> new Length([ 
                    'min' => 2,
                    'max' =>30,
                ]),
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre prénom'
                ]


            ])
            ->add('email',EmailType::class,[

                'label'=>'Email',
                'constraints'=> new Length([ 
                    'min' => 2,
                    'max'=>60,]),
                'attr'=> [
                    'placeholder'=> "Merci de saisir  votre email"
                ]
            ])
            ->add('password',RepeatedType::class,[
                // pour rendre les mot de passe saisit par l'utilisateur invisible.
                "type"=>PasswordType::class,
                'invalid_message'=>"le mot de passe et la confirmation doivent être identiques",

                "first_options"=> [
                    "label"=>"  Mot de passe",
                    'attr'=> [
                        'placeholder'=> "Merci de saisir  votre mot de passe"
                    ]
                    ],
                    "second_options"=> [
                        "label"=>" Confirmer mot de passe",
                        'attr'=> [
                            'placeholder'=> "Merci de confirmer votre mot de passe"
                        ]],
            ])
                        ->add( 'submit',SubmitType::class,[
                            'label'=> "s'inscrire",
                            'attr'=> ['class'=>'btn btn-primary']
                        
                
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
