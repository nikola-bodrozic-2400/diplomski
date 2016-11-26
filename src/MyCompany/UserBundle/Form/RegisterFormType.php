<?php
namespace MyCompany\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegisterFormType extends AbstractType
{
	public function getBlockPrefix()
    {
        return 'user_register';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'Symfony\Component\Form\Extension\Core\Type\TextType', [ 'attr' => ['class' => 'form-control'] ] )
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType', ['attr'=>['class' => 'form-control']])
            ->add('plainpassword', 'Symfony\Component\Form\Extension\Core\Type\RepeatedType', ["type"=>"Symfony\Component\Form\Extension\Core\Type\PasswordType"])
            ->add('roles', ChoiceType::class, array(
                'label' => 'I am:',
                'mapped' => true,
                'expanded' => false,
                'multiple' => true,
                'choices_as_values' => true,
                'choices' => array(
                    'Direktor' => 'ROLE_MANAGER',
                    'Novinar' => 'ROLE_NOVINAR',
                    'Web Master' => 'ROLE_WM',
                    'Lektor' => 'ROLE_LEKTOR',
                )
            ))
    	;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyCompany\UserBundle\Entity\User',
        ));
    }
}