<?php

namespace App\Form;

use App\Entity\UserResponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserResponseType extends AbstractType
{
   // src/Form/UserResponseType.php

public function buildForm(FormBuilderInterface $builder, array $options): void
{
    /** @var Question $question */
    $question = $options['question'];

    if ($question->getTypeReponse() === 'boolean') {
        $builder->add('valeur', ChoiceType::class, [
            'label' => false,
            'choices' => [
                'Oui' => 1,
                'Non' => 0,
            ],
            'expanded' => true,
        ]);
    }

    if ($question->getTypeReponse() === 'number') {
        $builder->add('valeur', NumberType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre réponse…',
                'class' => 'field',
            ],
        ]);
    }
}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserResponse::class,
        ]);
    }
}
