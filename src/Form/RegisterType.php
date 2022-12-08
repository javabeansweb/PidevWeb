<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname',TextType::class,[
                'label'=>'Votre nom et prénom',
                'attr'=>[
                    'placeholder'=>'Saisir votre nom et prénom'
                ]
            ])
            ->add('naissance',DateType::class,[
                'widget'=>'choice',
                'years'=>range(date('Y')-50,date('Y')-16),
                'months'=>range(date('M'),12),
                'days'=>range(1,31),
            ])

            ->add('email',EmailType::class,[
                'label'=>'Votre Email',
                'attr'=>[
                    'placeholder'=>'Saisir votre email'
                ]
            ])
            ->add('username',TextType::class,[
                'label'=>'Votre username',
                'constraints'=>new  Length(30,2),
                'attr'=>[
                    'placeholder'=>'Saisir votre username'
                ]
            ])

            ->add('password',RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message' => 'le mot de passe et la confirmation doit etre identique.',
                'label'=>'Votre mot de passe',
                'constraints'=>new  Length(30,8),
                'required'=>true,
                'first_options'=>['label'=>'Mot de passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre mot de passe'
                    ]
                    ],

                'second_options'=>['label'=>'Confirmer votre mot de passe',
                    'attr'=>[
                        'placeholder'=>'Confirmer votre mot de passe'
                    ]
                ],

            ])


            ->add('submit',SubmitType::class,[
                'label'=>"S'inscrire"
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
