<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
<<<<<<< HEAD
            ->add('createdAt')
            ->add('image')
        ;
=======
            ->add('image',FileType::class,array(
                'label'=>'choisissez une image pour votre actualite'
            ));
             
>>>>>>> 1e7275f4d3a6172dd4276b06b5f6929de365aab8
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
