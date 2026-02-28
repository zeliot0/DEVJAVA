<?php

namespace App\Form;

use App\Entity\PhoenixGoal;
use App\Entity\PhoenixNetwork;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoenixNetworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('networkType')
            ->add('connectedAt', null, ['data' => new \DateTime()])
            ->add('mentor', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('phoenixRising', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('sharedGoal', EntityType::class, [
                'class' => PhoenixGoal::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PhoenixNetwork::class,
        ]);
    }
}
