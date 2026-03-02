<?php

namespace App\Form; // <-- Même namespace pour tous les formulaires

use App\Entity\Milestones; // <-- Ici c'est Milestones
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Goal;
use Symfony\Component\Validator\Constraints as Assert; // <-- N'oubliez pas ce use

class MilestonesType extends AbstractType // <-- Ici c'est MilestonesType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du jalon *',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le titre du jalon est obligatoire.'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ],
                'attr' => [
                    'class' => 'nexa-form-control',
                    'placeholder' => 'Ex: Première étape, Révision intermédiaire...',
                    'data-counter' => 'title-counter'
                ],
                'help' => 'Minimum 3 caractères, maximum 100 caractères'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description *',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La description est obligatoire.'
                    ]),
                    new Assert\Length([
                        'min' => 10,
                        'max' => 255,
                        'minMessage' => 'La description doit faire au moins {{ limit }} caractères.',
                        'maxMessage' => 'La description ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ],
                'attr' => [
                    'class' => 'nexa-form-control textarea',
                    'rows' => '4',
                    'placeholder' => 'Décrivez ce jalon en détail...',
                    'data-counter' => 'description-counter'
                ],
                'help' => 'Minimum 10 caractères, maximum 255 caractères'
            ])
            ->add('dueDate', DateType::class, [
                'label' => 'Date d\'échéance *',
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La date d\'échéance est obligatoire.'
                    ]),
                    new Assert\GreaterThanOrEqual([
                        'value' => 'today',
                        'message' => 'La date d\'échéance ne peut pas être dans le passé.'
                    ])
                ],
                'attr' => [
                    'class' => 'nexa-form-control'
                ],
                'help' => 'Date à laquelle ce jalon doit être atteint'
            ])
            ->add('completedDate', DateType::class, [
                'label' => 'Date de complétion (si terminé)',
                'widget' => 'single_text',
                'required' => false,
                'html5' => true,
                'attr' => [
                    'class' => 'nexa-form-control'
                ],
                'help' => 'Date à laquelle ce jalon a été atteint (optionnel)'
            ])
            ->add('goalGoa', EntityType::class, [
                'label' => 'Objectif associé *',
                'class' => Goal::class,
                'choice_label' => 'titleGoa',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'L\'objectif associé est obligatoire.'
                    ])
                ],
                'attr' => [
                    'class' => 'nexa-form-control nexa-form-select'
                ],
                'help' => 'Sélectionnez l\'objectif auquel ce jalon appartient'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Milestones::class, // <-- Ici Milestones::class
        ]);
    }
}