<?php

namespace CBNBAdminBundle\Form;

use CBNBUserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roles = $options['user_roles'];
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'male' => User::GENDER_MALE,
                    'female' => User::GENDER_FEMALE,
                ]
            ])
            ->add('birthDate', BirthdayType::class, ['years' => range(1950, date('Y') - 18)])
            ->add('cityOfResidence', TextType::class, [
                'required' => false
            ])
            ->add('countryOfResidence', CountryType::class, [
                'required' => false
            ])
            ->add('avatarFilename', FileType::class, [
                'required' => false
            ])
            ->add('role', ChoiceType::class, [
                'mapped' => false,
                'choices' => $roles
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CBNBUserBundle\Entity\User',
            'user_roles' => []
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cbnbuserbundle_user';
    }


}
