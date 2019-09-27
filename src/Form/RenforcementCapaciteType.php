<?php

namespace App\Form;

use App\Entity\RenforcementCapacite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class RenforcementCapaciteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomStructure')
            ->add('localisation')
            ->add('region')
            ->add('arrondissement')
            ->add('distanceParRapoortARoute')
            ->add('nom')
            ->add('prenom')
            ->add('sexe',ChoiceType::class,[
                'choices' => [
                    'Homme' => 'M',
                    'Femme' => 'F',
                    
                ],
            ])
            ->add('ville')
            ->add('telephone')
            ->add('email')
            ->add('besoinEnRenforcement',ChoiceType::class,[
                'choices' => [
                    'Séminaires de Formation' => 'Séminaires de Formation',
                    'Atelier de Travail' => 'Atelier de Travail',
                    'Assistance/Appui Technique' => 'Assistance/Appui Technique',
                    'Conseil en Gestion aux Agro-Entreprises' => 'Conseil en Gestion aux Agro-Entreprises',
                    'Conseil en Gestion aux Organisations de Producteurs' => 'Conseil en Gestion aux Organisations de Producteurs',
                    'Autres ' => 'Autres ',
                    
                ],
            ])
            ->add('nombreDePlace')
            ->add('PlusDeDetails')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RenforcementCapacite::class,
        ]);
    }
}
