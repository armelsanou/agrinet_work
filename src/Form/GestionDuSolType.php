<?php

namespace App\Form;

use App\Entity\GestionDuSol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class GestionDuSolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('ville')
            ->add('telephone')
            ->add('niveauEtude')
            ->add('siuationFamiliale',ChoiceType::class,[
                'choices' => [
                    'marié(e)' => 'M',
                    'veuf/veuve ' => 'V',
                    'célibataire'=>'C'
                    
                ],
            ])
            ->add('nomStructure')
            ->add('localite')
            ->add('region')
            ->add('arrondissement')
            ->add('distanceParRapportARoute')
            ->add('anneeExperience')
            ->add('serviceSollicite',ChoiceType::class,[
                'choices' => [
                    'Analyse du sol ' => 'Analyse du sol ',
                    'Bilan Agronomique' => 'Bilan Agronomique',
                    'Système d’irrigation' => 'Système d’irrigation',
                    'Autres'=>'Autres'
                    
                ],
            ])
            ->add('autreSpecification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GestionDuSol::class,
        ]);
    }
}
