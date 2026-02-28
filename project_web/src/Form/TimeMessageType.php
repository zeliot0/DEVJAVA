<?php

namespace App\Form;

use App\Entity\TimeMessage;
use App\Entity\Goal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TimeMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $type = $options['type'];
        
        $builder
            ->add('titleMsg', TextType::class, [
                'label' => 'Title',
                'attr' => ['placeholder' => 'Give your message a title...'],
                'data' => $type === 'future' ? 'Letter to My Future Self' : 'Letter to My Past Self'
            ])
            ->add('contentMsg', TextareaType::class, [
                'label' => $type === 'future' ? '✍️ Write to Your Future Self' : '✍️ Write to Your Past Self',
                'attr' => [
                    'rows' => 8,
                    'placeholder' => $type === 'future' 
                        ? "Dear Future Me...\n\nI'm writing this on " . date('F j, Y') . "...\n\nWhat I want you to remember:\nWhat I hope you've achieved:\nWhat I'm feeling right now:" 
                        : "Dear Past Me...\n\nLooking back on " . date('F j, Y') . "...\n\nWhat I've learned since then:\nWhat I want you to know:\nYou were stronger than you knew:",
                    'class' => 'form-control'
                ]
            ])
            ->add('moodAtCreation', ChoiceType::class, [
                'label' => '🌈 How are you feeling right now?',
                'mapped' => false,
                'choices' => [
                    '😊 Happy' => 'happy',
                    '💪 Motivated' => 'motivated',
                    '😰 Anxious' => 'anxious',
                    '😢 Sad' => 'sad',
                    '🙏 Grateful' => 'grateful',
                    '🎉 Excited' => 'excited',
                    '🤔 Thoughtful' => 'thoughtful',
                    '😴 Tired' => 'tired',
                    '😤 Frustrated' => 'frustrated'
                ],
                'placeholder' => 'Select your current mood',
                'attr' => ['class' => 'form-select']
            ]);

        if ($type === 'future') {
            $builder->add('deliveryDateMsg', DateTimeType::class, [
                'label' => '📅 When should this be delivered?',
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'min' => (new \DateTime('+1 day'))->format('Y-m-d H:i'),
                    'class' => 'form-control'
                ],
                'data' => (new \DateTime('+1 year'))
            ]);
        }

        $builder->add('video', FileType::class, [
            'label' => '🎥 Video Message (optional)',
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '50M',
                    'mimeTypes' => [
                        'video/mp4',
                        'video/quicktime',
                        'video/x-msvideo',
                        'video/webm'
                    ],
                    'mimeTypesMessage' => 'Please upload a valid video file (MP4, MOV, AVI, WEBM)',
                ])
            ],
            'attr' => ['class' => 'form-control', 'accept' => 'video/*']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TimeMessage::class,
            'type' => 'future',
        ]);
        
        $resolver->setAllowedTypes('type', 'string');
        $resolver->setAllowedValues('type', ['past', 'future']);
    }
}