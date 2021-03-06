<?php

namespace App\Form;

use App\Entity\Phytopharmarcie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class PhytopharmacieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('culture')
            ->add('enemie')
            ->add('nomCommercial')
            ->add('societe')
            ->add('matiereActive')
            ->add('niveauToxicite')
            ->add('localite')
            ->add('classe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Phytopharmarcie::class,
            'method' => 'get',
            'csrf_protection' =>false
        ]);
    }

    public function getBlockPrefix(){
        return '';
    }
}
