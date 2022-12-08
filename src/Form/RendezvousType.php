<?php

namespace App\Form;

use App\Entity\Planing;
use App\Entity\Rendezvous;
use App\Entity\Service;
use App\Repository\RendezvousRepository;
use Cassandra\Date;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezvousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('date',DateType::class,[
                'widget'=>'choice',
                'years'=>range(date('Y'),date('Y')+10),
                'months'=>range(date('M'),12),
                'days'=>range(1,31),
            ])
            ->add('contrat')
            ->add('service',EntityType::class,
                [
                'class'=>Service::class,
                'choice_label'=>'nomSer',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rendezvous::class,
        ]);
    }
}
