<?php

namespace App\Form;

use App\Entity\Milestones;
use App\Entity\Goal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MilestonesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titleGoa', TextType::class, [
                'label' => 'Titre du jalon *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le titre du jalon',
                    'required' => 'required'
                ]
            ])
            ->add('descriptionGoa', TextareaType::class, [
                'label' => 'Description *',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'Décrivez ce jalon...',
                    'required' => 'required'
                ]
            ])
            ->add('completedatGoa', DateType::class, [
                'label' => 'Date d\'échéance *',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'required' => 'required'
                ]
            ])
            ->add('goal', EntityType::class, [
                'label' => 'Objectif associé *',
                'class' => Goal::class,
                'choice_label' => 'titleGoa',
                'attr' => [
                    'class' => 'form-select',
                    'required' => 'required'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Milestones::class,
        ]);
    }
}