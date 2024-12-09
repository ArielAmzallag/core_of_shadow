<?php

namespace App\Form;

use App\Entity\ShopLore;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('chapter', TextType::class)
            ->add('content', TextareaType::class)
            ->add('era', ChoiceType::class, [
                'choices' => [
                    'Ancient Times' => 'ancient',
                    'Dark Ages' => 'dark_ages',
                    'Golden Era' => 'golden_era',
                    'Modern Days' => 'modern',
                    'Unknown Period' => 'unknown'
                ]
            ])
            ->add('secretsRevealed', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShopLore::class,
        ]);
    }
}
