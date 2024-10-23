<?php

namespace App\Form;

use App\Entity\Shadow;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ShadowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('hiddenLore', TextareaType::class)
            ->add('celestialCoordinates', TextType::class)
            ->add('quantumSignature', TextType::class)
            ->add('temporalFrequency', NumberType::class)
            ->add('entropyLevel', NumberType::class)
            ->add('dimensionalKey', TextType::class)
            ->add('discoveryDate', DateTimeType::class)
            ->add('classificationCode', TextType::class)
            ->add('containmentProtocol', TextareaType::class)
            ->add('realityAnchorPoint', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Shadow::class,
        ]);
    }
}
