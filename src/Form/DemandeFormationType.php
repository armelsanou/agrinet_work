<?php

namespace App\Form;

use App\Entity\DemandeFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class DemandeFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe',ChoiceType::class,[
                'choices' => [
                    'Homme' => 'M',
                    'Femme' => 'F',
                    
                ],
            ])
            ->add('ville')
            ->add('telepone')
            ->add('niveauEtude')
            ->add('Email')
            ->add('experienceAgricole',ChoiceType::class,[
                'choices' => [
                    'Oui' => 'O',
                    'Non' => 'N',
                    
                ],
            ])
            ->add('detailleExperience')
            ->add('productionVegetale',ChoiceType::class,[
                'choices' => [
                    'Tomate' => 'Tomate',
                    'Mais' => 'Mais',
                    'Manioc' => 'Manioc',
                    'Ananas ' => 'Ananas ',
                    'Cacao' => 'Cacao',
                    'Poivron' => 'Poivron',
                    'Arachide' => 'Arachide',
                    'Igname' => 'Igname',
                    'Avocat' => 'Avocat',
                    'Haricot' => 'Haricot',
                    'Macabo' => 'Macabo',
                    'Papaye' => 'Papaye',
                    'Orange' => 'Orange',
                    'Piment' => 'Piment',
                    'Banane Plantain' => 'Banane Plantain',
                    'Pomme De Terre' => 'Pomme De Terre',
                    'Mangue' => 'Mangue',
                    'Citron' => 'Citron',
                    'Concombre ' => 'Concombre ',
                    'Champignon' => 'Champignon',
                    'Melon' => 'Melon',
                    'Autres' => 'Autres',
                ],
            ])
            ->add('productionAnimale',ChoiceType::class,[
                'choices' => [
                    'Poulet de chair' => 'Poulet de chair',
                    'Poulet Pondeuse' => 'Poulet Pondeuse',
                    'porc' => 'porc',
                    'lapin' => 'lapin',
                    'abeille' => 'abeille',
                    'Poisson' => 'Poisson',
                    'Escargot' => 'Escargot',
                    'Aulacodes' => 'Aulacodes',
                    'Autres' => 'Autres',
                    
                ],
            ])
            ->add('transformationEtSechage',ChoiceType::class,[
                'choices' => [
                    'Unité  Jus de Mangue' => 'Unité  Jus de Mangue',
                    'Unité Jus d’ananas' => 'Unité Jus d’ananas',
                    'Beurre de Cacao' => 'Beurre de Cacao',
                    'Chocolat' => 'Chocolat',
                    'Séchage  Mangue' => 'Séchage  Mangue',
                    'Yaourt' => 'Yaourt',
                    'Mini Laiterie' => 'Mini Laiterie',
                    'Autres' => 'Autres',
                    
                ],
            ])
            ->add('autreSpecification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DemandeFormation::class,
        ]);
    }
}
