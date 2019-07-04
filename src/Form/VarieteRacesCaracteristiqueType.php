<?php

namespace App\Form;

use App\Entity\VarieteRacesCaracteristique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VarieteRacesCaracteristiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('variete')
            ->add('caracteristiques')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VarieteRacesCaracteristique::class,
        ]);
    }
}
