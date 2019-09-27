<?php

namespace App\Form;

use App\Entity\MontageProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class MontageProjetType extends AbstractType
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
            ->add('email')
            ->add('situationFamiliale',ChoiceType::class,[
                'choices' => [
                    'marié(e)' => 'M',
                    'veuf/veuve ' => 'V',
                    'célibataire'=>'C'
                    
                ],
            ])
            ->add('titreProjet')
            ->add('nomCulture_Animaux')
            ->add('superficie_nombreAnimaux')
            ->add('capaciteTransformationOuDeSechage')
            ->add('dateDebutActivite')
            ->add('nomStructure')
            ->add('localisation')
            ->add('region')
            ->add('arrondissement')
            ->add('distanceParRapportAroute')
            ->add('serviceSollicite',ChoiceType::class,[
                'choices' => [
                    'Business plan entier' => 'Business plan entier',
                    'Compte d’exploitation ' => 'Compte d’exploitation',
                    'Etude de faisabilité'=>'Etude de faisabilité',
                    'Sondages et recherches socio-économiques qualitatives et quantitatives' => 'Sondages et recherches socio-économiques qualitatives et quantitatives',
                    'Autres'=>'Autres'
                    
                ],
            ])
            ->add('autreSpecification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MontageProjet::class,
        ]);
    }
}
