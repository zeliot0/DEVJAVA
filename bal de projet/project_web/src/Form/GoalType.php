<?php

namespace App\Form;

use App\Entity\Goal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class GoalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titleGoa', TextType::class, [
                'label' => 'Titre *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le titre de l\'objectif',
                    'minlength' => 3,
                    'maxlength' => 100
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le titre est obligatoire.']),
                    new Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('descriptionGoa', TextareaType::class, [
                'label' => 'Description *',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'Décrivez votre objectif...',
                    'minlength' => 10,
                    'maxlength' => 255
                ],
                'constraints' => [
                    new NotBlank(['message' => 'La description est obligatoire.']),
                    new Length([
                        'min' => 10,
                        'max' => 255,
                        'minMessage' => 'La description doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'La description ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('dateDebutGoa', DateType::class, [
                'label' => 'Date de début *',
                'widget' => 'single_text',
                'required' => false, // Changed to false since property is nullable
                'attr' => [
                    'class' => 'form-control',
                    'min' => date('Y-m-d')
                ],
                'constraints' => [
                    // Removed NotBlank constraint since field is optional
                ]
            ])
            ->add('dateFinalGoa', DateType::class, [
                'label' => 'Date de fin *',
                'widget' => 'single_text',
                'required' => false, // Changed to false since property is nullable
                'attr' => [
                    'class' => 'form-control',
                    'min' => date('Y-m-d')
                ],
                'constraints' => [
                    // Removed NotBlank constraint since field is optional
                ]
            ])
            ->add('statusGoa', ChoiceType::class, [
                   'label' => 'Statut',
                'choices' => [
        'Brouillon' => 'BROUILLON',
        'En cours' => 'EN_COURS',
        'Terminé' => 'TERMINÉ',
        'Archivé' => 'ARCHIVÉ'
                ],
                'attr' => ['class' => 'form-select']
            ])
            ->add('progressGoa', NumberType::class, [
                'label' => 'Progression (%)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1
                ],
                'constraints' => [
                    new Range([
                        'min' => 0,
                        'max' => 100,
                        'notInRangeMessage' => 'La progression doit être entre {{ min }} et {{ max }} %.'
                    ])
                ]
            ])
            ->add('categoryGoa', TextType::class, [
                'label' => 'Catégorie *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex: Travail, Personnel, Étude...',
                    'minlength' => 2,
                    'maxlength' => 50
                ],
                'constraints' => [
                    new NotBlank(['message' => 'La catégorie est obligatoire.']),
                    new Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'La catégorie doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'La catégorie ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('priorityGoa', ChoiceType::class, [
    'label' => 'Priorité',
    'choices' => [
        'Basse' => 'BASSE',
        'Moyenne' => 'MOYENNE',
        'Haute' => 'HAUTE',
        'Urgente' => 'URGENTE'
    ],
                'attr' => ['class' => 'form-select']
            ])
            ->add('notesGoa', TextareaType::class, [
                'label' => 'Notes',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                    'maxlength' => 1000
                ],
                'constraints' => [
                    new Length([
                        'max' => 1000,
                        'maxMessage' => 'Les notes ne peuvent pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('colorGoa', ColorType::class, [
                'label' => 'Couleur',
                'required' => false,
                'attr' => ['class' => 'form-control form-control-color'],
                'constraints' => [
                    new Length([
                        'max' => 7,
                        'maxMessage' => 'La couleur ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Goal::class,
            'attr' => [
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}