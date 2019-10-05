<?php

namespace App\Form;

use App\Entity\FormationInitImg;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class FormationInitImgType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('image1',FileType::class,array(
            'label'=>'choisissez une image pour votre actualite'
        ))
        ->add('image2',FileType::class,array(
            'label'=>'choisissez une image pour votre actualite'
        ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormationInitImg::class,
        ]);
    }
}
