<?php

namespace App\Form;

use App\Entity\Theme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // 🧩 Domaine de vie (stocké dans nom pour l’instant)
            ->add('nom', ChoiceType::class, [
                'label' => 'Domaine de vie',
                'choices' => [
                    '🧠 Mental' => 'Mental',
                    '❤️ Santé' => 'Santé',
                    '💼 Travail' => 'Travail',
                    '👨‍👩‍👧 Famille' => 'Famille',
                    '💰 Argent' => 'Argent',
                    '🌍 Social' => 'Social',
                    '📚 Apprentissage' => 'Apprentissage',
                ],
                'placeholder' => 'Choisir un domaine',
            ])

            // 📝 description_q
            ->add('description_q', TextareaType::class, [
                'label' => 'description_q',
                'required' => false,
            ])

            // 🎨 Icône
            ->add('icone', ChoiceType::class, [
                'label' => 'Icône',
                'choices' => [
                    'Sante (Heart)' => 'fa-solid fa-heart',
                    'Mental (Brain)' => 'fa-solid fa-brain',
                    'Travail (Briefcase)' => 'fa-solid fa-briefcase',
                    'Famille (Users)' => 'fa-solid fa-users',
                    'Argent (Wallet)' => 'fa-solid fa-wallet',
                    'Social (Earth)' => 'fa-solid fa-earth-americas',
                    'Apprentissage (Book)' => 'fa-solid fa-book-open',
                ],
                'expanded' => true,
                'multiple' => false,
            ])

            // ⚡ Priorité (INT ✔️)
            ->add('priorite', ChoiceType::class, [
                'label' => 'Priorité',
                'choices' => [
                    'Basse' => 1,
                    'Moyenne' => 2,
                    'Haute' => 3,
                ],
                'placeholder' => 'Choisir une priorité',
            ])

            // ✅ Actif
            ->add('actif', CheckboxType::class, [
                'label' => 'Thème actif',
                'required' => false,
            ])

            // 🎯 Intention
            ->add('intention', TextType::class, [
                'label' => 'Intention',
                'required' => false,
            ])

            // 🎨 Couleur
            ->add('couleur', ColorType::class, [
                'label' => 'Couleur',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Theme::class,
        ]);
    }
}
