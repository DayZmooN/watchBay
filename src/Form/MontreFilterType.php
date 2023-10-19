<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Materiaux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MontreFilterType extends AbstractType
{
    // src/Form/MontreFilterType.php
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Categories', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true, // rend le choix multiple comme des cases à cocher
            ])
            ->add('Materiaux', EntityType::class, [  // Assurez-vous que la casse est correcte ici
                'class' => Materiaux::class,
                'choice_label' => 'type',
                'multiple' => true,
                'expanded' => true,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // pas de données associées à ce formulaire
            'data_class' => null,
            'csrf_protection' => false, // Désactiver la protection CSRF si vous utilisez ce formulaire pour une requête GET
        ]);
    }
}
