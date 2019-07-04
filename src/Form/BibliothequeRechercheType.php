<?php

namespace App\Form;

use App\Entity\BibliothequeRecherche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliothequeRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie')
            ->add('cultureElevage')
            ->add('localiteRegion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BibliothequeRecherche::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
    public function getBlockPrefix(){
        return '';
    }
}
