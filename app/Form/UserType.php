<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add(
                'roles',
                ChoiceType::class,
                [
                    'choices' => [
                        'Administrator' => 'ROLE_ADMIN',
                        'Company' => 'ROLE_COMPANY',
                        'Candidate' => 'ROLE_APPLICANT',
                    ],
                    'multiple' => true,
                    'expanded' => true,
                ]
            )
            ->add('password');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
