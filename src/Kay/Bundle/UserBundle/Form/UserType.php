<?php

namespace Kay\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('isActive')
            ->add('rolesList', ChoiceType::class, array(
                'label'     => 'Role',
                'choices'   => array(
                    'User'          => 'ROLE_USER',
                    'Auteur'        => 'ROLE_AUTHOR',
                    'Admin'         => 'ROLE_ADMIN',
                    'Super Admin'   => 'ROLE_SUPER_ADMIN',
                ),
                'choices_as_values' => true,
                'mapped'            => false
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kay\Bundle\UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kay_bundle_blogbundle_user';
    }


}
