<?php

namespace App\Form;

use App\Entity\DevenirExpert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DevenirExpertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('statutProfessionel',ChoiceType::class,[
                'choices' => [
                    'Freelance' => 'Freelance',
                    'Salarie' => 'Salarie',
                    'Jeune diplomé (e)'   => 'Jeune diplomé (e)',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('pays',CountryType::class,array( 'label' => 'Pays',
            'preferred_choices' => array('FR'),
            'choice_translation_locale' => null
            ))
            ->add('ville')
            ->add('mobilite',ChoiceType::class,[
                'choices' => [
                    'régionale' => 'régionale',
                    'nationale' => 'nationale',
                    'sous-region Afrique centrale'   => 'sous-region Afrique centrale',

                ],
                    
                ])
            ->add('fonctionActuelle')

            ->add('niveauExperience',ChoiceType::class,[
                'choices' => [
                    'inferieur à 02 ans' => 'inferieur à 02 ans',
                    'inferieur à 04 ans' => 'inferieur à 04 ans',
                    'entre 05 et 10 ans' => 'entre 05 et 10 ans',
                    '10 à 20 ans' => '10 à 20 ans',
                    'supérieur à 20 ans' => 'supérieur à 20 ans',
                    
                ],
            ])
            
            ->add('langue1',ChoiceType::class,[
                'choices' => [
                    'English' => 'an',
                    'Français' => 'fr',
                    
                ],
            ])
            ->add('langue2',ChoiceType::class,[
                'choices' => [
                    'English' => 'an',
                    'Français' => 'fr',
                ],
            ])
            ->add('langueVernaculaire')
            ->add('secteurActivite1',ChoiceType::class,[
                'choices' => [
                    'Agroéconomie' => 'Agroéconomie',
                    'Industrie agro-alimentaire' => 'Industrie agro-alimentaire',
                    'Informatique'   => 'Informatique',
                    'Machinisme agricole' => 'Machinisme agricole',
                    'Phytopathologie'   => 'Phytopathologie',
                    'Production animale' => 'Production animale',
                    'Production végétale'   => 'Production végétale',
                    'Sciences du sol' => 'Sciences du sol',
                    'Technologie post-récolte' => 'Technologie post-récolte',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('secteurActivite2',ChoiceType::class,[
                'choices' => [
                    'Agroéconomie' => 'Agroéconomie',
                    'Industrie agro-alimentaire' => 'Industrie agro-alimentaire',
                    'Informatique'   => 'Informatique',
                    'Machinisme agricole' => 'Machinisme agricole',
                    'Phytopathologie'   => 'Phytopathologie',
                    'Production animale' => 'Production animale',
                    'Production végétale'   => 'Production végétale',
                    'Sciences du sol' => 'Sciences du sol',
                    'Technologie post-récolte' => 'Technologie post-récolte',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('secteurActivite3',ChoiceType::class,[
                'choices' => [
                    'Agroéconomie' => 'Agroéconomie',
                    'Industrie agro-alimentaire' => 'Industrie agro-alimentaire',
                    'Informatique'   => 'Informatique',
                    'Machinisme agricole' => 'Machinisme agricole',
                    'Phytopathologie'   => 'Phytopathologie',
                    'Production animale' => 'Production animale',
                    'Production végétale'   => 'Production végétale',
                    'Sciences du sol' => 'Sciences du sol',
                    'Technologie post-récolte' => 'Technologie post-récolte',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('competence1',ChoiceType::class,[
                'choices' => [
                    'Analyse du sol'=>'Analyse du sol',
                    'Appui technique '=>'Appui technique',
                    'Commerce et Distribution d’intrants agricoles '=>'Commerce et Distribution d’intrants agricoles',
                    'Conduite d’une culture '=>'Conduite d’une culture',
                    'Conduite d’élevage '=>'Conduite d’élevage',
                    'développement des applications mobiles '=>'développement des applications mobiles',
                    'Etudes (faisabilité, marché, impact, etc) '=>'Etudes (faisabilité, marché, impact, etc)',
                    'Fertilisation '=>'Fertilisation',
                    'Formation '=>'Formation',
                    'Gestion d’une exploitation agropastorale '=>'Gestion d’une exploitation agropastorale',
                    'Mise en réseau des producteurs '=>'Mise en réseau des producteurs',
                    'Nutrition animale '=>'Nutrition animale',
                    'Partenariats '=>'Partenariats',
                    'Procédés industriels '=>'Procédés industriels',
                    'programmation '=>'programmation',
                    'R&D, Expérimentation '=>'R&D, Expérimentation',
                    'Séchage et conservation des denrées agricoles '=>'Séchage et conservation des denrées agricoles',
                    'Vulgarisation agricole (Développement agricole)'=>'Vulgarisation agricole (Développement agricole)',
                   
                ],
            ])
            ->add('competence2',ChoiceType::class,[
                'choices' => [
                    'Analyse du sol'=>'Analyse du sol',
                    'Appui technique '=>'Appui technique',
                    'Commerce et Distribution d’intrants agricoles '=>'Commerce et Distribution d’intrants agricoles',
                    'Conduite d’une culture '=>'Conduite d’une culture',
                    'Conduite d’élevage '=>'Conduite d’élevage',
                    'développement des applications mobiles '=>'développement des applications mobiles',
                    'Etudes (faisabilité, marché, impact, etc) '=>'Etudes (faisabilité, marché, impact, etc)',
                    'Fertilisation '=>'Fertilisation',
                    'Formation '=>'Formation',
                    'Gestion d’une exploitation agropastorale '=>'Gestion d’une exploitation agropastorale',
                    'Mise en réseau des producteurs '=>'Mise en réseau des producteurs',
                    'Nutrition animale '=>'Nutrition animale',
                    'Partenariats '=>'Partenariats',
                    'Procédés industriels '=>'Procédés industriels',
                    'programmation '=>'programmation',
                    'R&D, Expérimentation '=>'R&D, Expérimentation',
                    'Séchage et conservation des denrées agricoles '=>'Séchage et conservation des denrées agricoles',
                    'Vulgarisation agricole (Développement agricole)'=>'Vulgarisation agricole (Développement agricole)',
                   
                ],
            ])
            ->add('competence3',ChoiceType::class,[
                'choices' => [
                    'Analyse du sol'=>'Analyse du sol',
                    'Appui technique '=>'Appui technique',
                    'Commerce et Distribution d’intrants agricoles '=>'Commerce et Distribution d’intrants agricoles',
                    'Conduite d’une culture '=>'Conduite d’une culture',
                    'Conduite d’élevage '=>'Conduite d’élevage',
                    'développement des applications mobiles '=>'développement des applications mobiles',
                    'Etudes (faisabilité, marché, impact, etc) '=>'Etudes (faisabilité, marché, impact, etc)',
                    'Fertilisation '=>'Fertilisation',
                    'Formation '=>'Formation',
                    'Gestion d’une exploitation agropastorale '=>'Gestion d’une exploitation agropastorale',
                    'Mise en réseau des producteurs '=>'Mise en réseau des producteurs',
                    'Nutrition animale '=>'Nutrition animale',
                    'Partenariats '=>'Partenariats',
                    'Procédés industriels '=>'Procédés industriels',
                    'programmation '=>'programmation',
                    'R&D, Expérimentation '=>'R&D, Expérimentation',
                    'Séchage et conservation des denrées agricoles '=>'Séchage et conservation des denrées agricoles',
                    'Vulgarisation agricole (Développement agricole)'=>'Vulgarisation agricole (Développement agricole)',
                   
                ],
            ])
            ->add('autre')
            ->add('cv',FileType::class,array(
                'label'=>'choisissez un document '
            ))
           
            ->add('souhaitMail',CheckboxType::class, [
                
                'label'    => "je souhaite recevoir l'actualité d'AGRINET par mail",
                'required' => false,
               
                

                
               
            ])

            ->add('situationPro1',CheckboxType::class, [
                
                'label'    => "Je propose mes compétences pour une intervention ponctuelle sur une mission de conseil ",
                'required' => false,
               
                

                
               
            ])

            ->add('situationPro2',CheckboxType::class, [
                
                'label'    => "Je cherche un emploi en CDD/CDI",
                'required' => false,
               
                

                
               
            ])
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            // ... add a choice list of friends of the current application user
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DevenirExpert::class,
        ]);
    }
}
