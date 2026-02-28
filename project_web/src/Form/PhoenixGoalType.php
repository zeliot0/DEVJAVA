<?php

namespace App\Form;

use App\Entity\PhoenixGoal;
use App\Entity\Goal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoenixGoalType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('originalGoal', EntityType::class, [
            'class' => Goal::class,
            'choice_label' => 'titleGoa',
            'choice_value' => 'idGoa',
            'placeholder' => 'Select original goal',
            'required' => true,
        ])
        ->add('rebornGoal', EntityType::class, [
            'class' => Goal::class,
            'choice_label' => 'titleGoa',
            'choice_value' => 'idGoa',
            'placeholder' => 'Select reborn goal',
            'required' => false,
        ])
        ->add('deathAnalysis')
        // 🔥 Comment out JSON fields to avoid array-to-string error
        // ->add('ashesData')
        ->add('deathDate', null, [
            'widget' => 'single_text',
        ])
        ->add('rebirthDate', null, [
            'widget' => 'single_text',
            'required' => false,
        ])
        ->add('phoenixPhase')
        ->add('phoenixLevel')
        // ->add('resurrectionPlan')
        ->add('immortalityEnabled')
        // user field if present...
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PhoenixGoal::class,
        ]);
    }
}