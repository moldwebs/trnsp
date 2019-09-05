<?php

namespace App\Form;

use App\Entity\Waybill;
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

class WaybillCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('seria', TextType::class, ['label' => 'SERIA', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('numar_fp', TextType::class, ['label' => 'NUMAR FOAIE PARCURS', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-6']])
            ->add('numar_beb', TextType::class, ['label' => 'NUMAR BEB', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('date_start', DateType::class, ['widget' => 'single_text', 'label' => 'DATA PLECARE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('date_end', DateType::class, ['widget' => 'single_text', 'label' => 'DATA SOSIRE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('notes', TextType::class, ['label' => 'NOTITE', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('location', EntityType::class, ['class' => Location::class, 'placeholder' => '', 'label' => 'LOCALITATE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('destination', EntityType::class, ['class' => Destination::class, 'placeholder' => '', 'label' => 'DESTINATIE', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('terminal', EntityType::class, ['class' => Terminal::class, 'placeholder' => '', 'label' => 'GARA', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('trip', EntityType::class, ['class' => Trip::class, 'placeholder' => '', 'label' => 'ORA', 'attr' => ['placeholder' => '', 'class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('driver', EntityType::class, ['class' => Driver::class, 'placeholder' => '', 'label' => 'SOFER', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('transport', EntityType::class, ['class' => Transport::class, 'placeholder' => '', 'label' => 'TRANSPORT', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('driver_extra', EntityType::class, ['class' => Driver::class, 'required' => false, 'placeholder' => '', 'label' => 'SOFER 2', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('motorina', NumberType::class, ['label' => 'MOTORINA, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('motorina_rest', NumberType::class, ['label' => 'MOTORINA REST, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('plan', NumberType::class, ['label' => 'PLAN, MDL', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('ore_lucru', TimeType::class, ['widget' => 'single_text', 'label' => 'ORE LUCRU', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('ora_retur', TimeType::class, ['widget' => 'single_text', 'label' => 'ORA RETUR', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
            ->add('ore_sofer', ChoiceType::class, ['choices' => array_flip(Waybill::ORE_SOFER), 'label' => 'ORE SOFER', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-2']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Waybill::class,
            ]);
    }
}