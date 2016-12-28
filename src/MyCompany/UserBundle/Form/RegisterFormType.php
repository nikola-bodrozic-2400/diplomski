<?php
namespace MyCompany\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

/**
 * Class RegisterFormType
 *
 * @package MyCompany\UserBundle\Form
 */
class RegisterFormType extends AbstractType
{
    /**
     * role koje se dobijaju od dependancy injection
     *
     * @var array
     */
    private $p = array();

    /**
     * role koje se prosledjuju parametru choices u bulidForm metodi
     *
     * @var array
     */
    private $roles4form = array();

    /**
     * RegisterFormType constructor.
     *
     */
    public function __construct($p)
    {
        $this->p = $p;
        for($i = 0; $i < count($this->p); ++$i) {
            $this->roles4form[$this->p[$i]->getHname()] = $this->p[$i]->getName();
        }
        $priv = array(
            'Direktor' => 'ROLE_MANAGER',
            'Novinar' => 'ROLE_NOVINAR',
            'Web Master' => 'ROLE_WM',
            'Lektor' => 'ROLE_LEKTOR',
            'Knjigovodja' => 'ROLE_KNJIG'
        );

        $this->roles4form = array_merge($this->roles4form, $priv);
    }

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
            ->add('roles', ChoiceType::class, array(
                'label' => 'I am:',
                'mapped' => false,
                'expanded' => false,
                'multiple' => true,
                'choices_as_values' => true,
                'choices' => $this->roles4form,
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