<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('texte', TextareaType::class, [
                'label' => 'Question',
                'attr' => [
                    'placeholder' => 'Ex: As-tu bu suffisamment d eau aujourd hui ?',
                    'rows' => 4,
                ],
                'help' => 'Ecris une question courte, claire et actionnable.',
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de question',
                'choices' => [
                    'Numerique' => 'numerique',
                    'Choix multiple' => 'choix',
                    'Texte' => 'texte',
                    'Oui / Non' => 'boolean',
                ],
                'help' => 'Definit la nature metier de la question.',
            ])
            ->add('typeReponse', ChoiceType::class, [
                'label' => 'Type de reponse',
                'choices' => [
                    'Nombre' => 'number',
                    'Texte' => 'text',
                    'Booleen' => 'boolean',
                ],
                'help' => 'Definit le format attendu pour la saisie utilisateur.',
            ])
            ->add('unite', TextType::class, [
                'label' => 'Unite',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ex: litres, heures, minutes',
                ],
                'help' => 'Optionnel. Renseigne ce champ surtout pour les reponses numeriques.',
            ])
            ->add('valeurIdeale', NumberType::class, [
                'label' => 'Valeur ideale',
                'required' => false,
                'help' => 'Objectif cible pour evaluer la reponse.',
            ])
            ->add('niveau', ChoiceType::class, [
                'label' => 'Niveau d importance',
                'choices' => [
                    '1 - Tres faible' => 'tres_faible',
                    '2 - Faible' => 'faible',
                    '3 - Moyen' => 'moyen',
                    '4 - Eleve' => 'eleve',
                    '5 - Critique' => 'critique',
                ],
                'expanded' => true,
                'help' => 'Ce niveau sert a prioriser les actions dans les rapports.',
            ])
            ->add('frequence', ChoiceType::class, [
                'label' => 'Frequence',
                'choices' => [
                    'Quotidienne' => 'quotidienne',
                    'Hebdomadaire' => 'hebdomadaire',
                    'Mensuelle' => 'mensuelle',
                ],
                'help' => 'Rythme de repetition de la question.',
            ])
            ->add('genereTache', CheckboxType::class, [
                'label' => 'Generer une tache si non respectee',
                'required' => false,
                'help' => 'Active un suivi automatique si la cible nest pas atteinte.',
            ])
            ->add('actif', CheckboxType::class, [
                'label' => 'Question active',
                'required' => false,
                'help' => 'Desactive temporairement la question sans la supprimer.',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
