<?php

namespace App\Form;

use App\Entity\Rdv;
use App\Entity\Voyageur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RdvTypeoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('heure')
            ->add('Voyageur',EntityType::class,['class'=>Voyageur::class,'choice_label'=>'nom'])
            ->add('Envoyer',SubmitType::class)
            ->add('réinitialliser',SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rdv::class,
        ]);
    }
}
