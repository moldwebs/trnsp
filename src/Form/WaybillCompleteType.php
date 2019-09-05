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

class WaybillCompleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motorina', NumberType::class, ['label' => 'MOTORINA, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('motorina_plecare', NumberType::class, ['label' => 'MOTORINA PLECARE, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('motorina_consumata', NumberType::class, ['label' => 'MOTORINA CONSUMATA, L', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('plan', NumberType::class, ['label' => 'PLAN, MDL', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('ore_lucru', TimeType::class, ['widget' => 'single_text', 'label' => 'ORE LUCRU', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('km_start', IntegerType::class, ['label' => 'KM PLECARE', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('km_end', IntegerType::class, ['label' => 'KM SOSIRE', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('km_parcurs', IntegerType::class, ['label' => 'KM PARCURS', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('annulled', ChoiceType::class, ['choices' => array_flip(Waybill::TIP_CURSA), 'label' => 'TIP CURSA', 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-3']])
            ->add('notes', TextType::class, ['label' => 'NOTITE', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-6']])
            ->add('diagrama_qnt', IntegerType::class, ['label' => 'NUM CALATORI (BANI CASH)', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
            ->add('diagrama_amount', NumberType::class, ['label' => 'SUMA TOTALA (BANI CASH)', 'required' => false, 'attr' => ['class' => 'input-sm', 'row_prefix' => 'col-md-4']])
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