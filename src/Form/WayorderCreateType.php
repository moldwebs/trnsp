<?php

namespace App\Form;

use App\Entity\Wayorder;
use App\Entity\Driver;
use App\Entity\Destination;
use App\Entity\Location;
use App\Entity\Terminal;
use App\Entity\Transport;
use App\Entity\Trip;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WayorderCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('seria', TextType::class, ['label' => 'SERIA', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('numar_fp', IntegerType::class, ['label' => 'NUMAR FOAIE PARCURS', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-10']])
            ->add('date_start', DateType::class, ['widget' => 'single_text', 'label' => 'DATA PLECARE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('date_end', DateType::class, ['widget' => 'single_text', 'label' => 'DATA SOSIRE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('notes', TextType::class, ['label' => 'NOTITE', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('location', EntityType::class, ['class' => Location::class, 'placeholder' => '', 'label' => 'LOCALITATE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('destination', TextType::class, ['label' => 'DESTINATIE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('driver', EntityType::class, ['class' => Driver::class, 'placeholder' => '', 'label' => 'SOFER', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('transport', EntityType::class, ['class' => Transport::class, 'placeholder' => '', 'label' => 'TRANSPORT', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('motorina', NumberType::class, ['label' => 'MOTORINA, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('motorina_rest', NumberType::class, ['label' => 'MOTORINA REST, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('ore_lucru', TimeType::class, ['widget' => 'single_text', 'label' => 'ORE LUCRU', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Wayorder::class,
            ]);
    }
}