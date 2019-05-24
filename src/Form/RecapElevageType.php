<?php

namespace App\Form;

use App\Entity\RecapElevage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecapElevageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'required' => true,
                'years' => range(date('Y')-99, date('Y')),
            ])
            ->add('activite')
            ->add('duree')
            ->add('nomTraitement')
            ->add('quantiteTraitement')
            ->add('uniteTraitement')
            ->add('prixTraitement')
            ->add('nomAlimentation')
            ->add('quantiteAlimentation')
            ->add('prixAlimentation')
            ->add('nomComplement')
            ->add('quantiteComplement')
            ->add('prixComplement')
            ->add('nombreFamilial')
            ->add('prixValeurFamilial')
            ->add('nombreEmploye')
            ->add('coutEmploye')
            ->add('nombreTacheron')
            ->add('coutTacheron')
            ->add('transport')
            ->add('autre')
            ->add('sexeAnimal')
            ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecapElevage::class,
        ]);
    }
}
