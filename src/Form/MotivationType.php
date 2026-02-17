<?php

namespace App\Form;

use App\Entity\Motivation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class MotivationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Restez positif !',
                    'minlength' => '3',
                    'maxlength' => '100'
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le titre est obligatoire.'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                    'placeholder' => 'Ex: Chaque petit pas compte...',
                    'minlength' => '10',
                    'maxlength' => '500'
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La description est obligatoire.'
                    ]),
                    new Assert\Length([
                        'min' => 10,
                        'max' => 500,
                        'minMessage' => 'La description doit faire au moins {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('mood', ChoiceType::class, [
                'label' => 'Humeur',
                'required' => true,
                'choices' => [
                    '😢 Triste' => 'sad',
                    '😊 Content' => 'happy',
                    '🚀 Motivé' => 'motivated',
                    '😴 Fatigué' => 'tired',
                    '😰 Stressé' => 'stressed',
                    '😞 Démotivé' => 'unmotivated'
                ],
                'attr' => ['class' => 'form-select'],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'L\'humeur est obligatoire.'
                    ])
                ]
            ])
           // src/Form/MotivationType.php

->add('image', TextType::class, [
    'label' => 'URL de l\'image (optionnel)',
    'required' => false,
    'attr' => [
        'class' => 'form-control',
        'placeholder' => 'https://example.com/image.jpg'
    ],
    'constraints' => [
        new Assert\Url([
            'message' => 'Veuillez entrer une URL valide pour l\'image (ex: https://example.com/image.jpg).'
        ]),
        new Assert\Length([
            'max' => 255,
            'maxMessage' => 'L\'URL ne peut pas dépasser {{ limit }} caractères.'
        ])
    ]
]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Motivation::class,
            'attr' => [
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}