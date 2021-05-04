<?php


namespace App\Form;


use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('transportMethod', ChoiceType::class, [
                'choices' => [
                    'Bike' => 'Bike',
                    'Car' => 'Car',
                    'Train' => 'Train',
                    'Bus' => 'Bus'
                ]
            ])
            ->add('travelDistance')
            ->add('workdaysPerWeek');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class
        ]);
    }

}