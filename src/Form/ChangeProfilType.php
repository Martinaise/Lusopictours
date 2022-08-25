<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangeProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nom',TextType::class,[
                'label'=>'Votre nom'
            ])
            ->add('prenom',TextType::class,[
                'label'=>'Votre prénom'
            ])
            ->add('adresse',TextType::class,[
                'label'=>'Votre adresse'
            ])
            ->add('cp',TextType::class,[
                'label'=>'Votre code postal'
            ])
            ->add('tel',TextType::class,[
                'label'=>'Votre numéro de téléphone'
            ])
            ->add('ville',TextType::class,[
                'label'=>'Votre ville',
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
