<?php

namespace App\Form;

use App\Entity\DevenirExpert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

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
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('pays',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('ville',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('fonctionActuelle')
            ->add('langue1',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('langue2',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('secteurActivite1',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('secteurActivite2',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('secteurActivite3',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('competence1',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('competence2',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('competence3',ChoiceType::class,[
                'choices' => [
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Bork'   => 'muppets',
                    'Pirate' => 'arr',
                ],
            ])
            ->add('autre')
            ->add('cv')
            ->add('souhaitMail',CheckboxType::class, [
                
                'label'    => "je souhaite recevoir l'actualité d'AGRINET par mail",
                'required' => false,
               
                

                
               
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DevenirExpert::class,
        ]);
    }
}
