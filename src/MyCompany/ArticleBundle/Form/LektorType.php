<?php

namespace MyCompany\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LektorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', ['label' => 'Naslov'] )
            ->add('body', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', ['label' => 'Tekst'] )
            ->add('preview', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', ['label' => 'Preview'] )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyCompany\ArticleBundle\Entity\Article',
            'attr' => array('novalidate'=>'novalidate'),
        ));
    }
}
