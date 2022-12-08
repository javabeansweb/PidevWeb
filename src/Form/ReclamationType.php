<?php

namespace App\Form;

use App\Entity\Reclamation;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname_rec_s')
            ->add('fullname_rec_r')
            ->add('Categorie',EntityType::class,[

                'class'=> Categorie::class,
                'choice_label'=>'nom_Categorie',
            ])
            ->add('mail')
            ->add('num_tel')
            ->add('text_rec')
            ->add('date_de_rec')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
