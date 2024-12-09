<?php

namespace App\Form;

use App\Entity\Curse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CurseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('power', NumberType::class)
            ->add('price', NumberType::class)
            ->add('duration', NumberType::class)
            ->add('sideEffects', TextareaType::class)
            ->add('rarity', ChoiceType::class, [
                'choices' => [
                    'Common' => 'common',
                    'Uncommon' => 'uncommon',
                    'Rare' => 'rare',
                    'Epic' => 'epic',
                    'Legendary' => 'legendary',
                    'Forbidden' => 'forbidden'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Curse::class,
        ]);
    }
}
