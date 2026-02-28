<?php

namespace App\Form;

use App\Entity\TimeMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeMessage1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titleMsg')
            ->add('messageTypeG')
            ->add('contentMsg')
            ->add('videoPathMsg')
            ->add('deliveryDateMsg')
            ->add('isDeliveredMsg')
            ->add('createdAtMsg')
            ->add('idUser')
            ->add('parentMessageId')
            ->add('idG')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TimeMessage::class,
        ]);
    }
}
