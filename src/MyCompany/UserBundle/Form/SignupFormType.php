<?php
namespace MyCompany\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class SignupFormType extends AbstractType
{
	public function getBlockPrefix()
    {
        return 'user_register';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ime', 'Symfony\Component\Form\Extension\Core\Type\TextType', [ 'attr' => ['class' => 'form-control'] ] )
            ->add('username', 'Symfony\Component\Form\Extension\Core\Type\TextType', [ 'attr' => ['class' => 'form-control'] ] )
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType', ['attr'=>['class' => 'form-control']])
            ->add('plainpassword', 'Symfony\Component\Form\Extension\Core\Type\RepeatedType', ["type"=>"Symfony\Component\Form\Extension\Core\Type\PasswordType"])
    	;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyCompany\UserBundle\Entity\User',
        ));
    }
}