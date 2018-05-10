<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('body', TextAreaType::class, array('attr' => array('class' => 'form-control', 'rows' => 5 ,)))
        ->add('image', FileType::class, array('label' => 'Product image', 'attr' => array('class' => 'form-control')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
