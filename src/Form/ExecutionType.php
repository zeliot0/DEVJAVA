<?php

namespace App\Form;

use App\Entity\Execution;
use App\Entity\Task;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExecutionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title_exe')
            ->add('desc_exe')
            ->add('status_exe')
            ->add('createAt_exe', null, [
                'widget' => 'single_text',
            ])
            ->add('updateAT_exe', null, [
                'widget' => 'single_text',
            ])
            ->add('task', EntityType::class, [
                'class' => Task::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Execution::class,
        ]);
    }
}
