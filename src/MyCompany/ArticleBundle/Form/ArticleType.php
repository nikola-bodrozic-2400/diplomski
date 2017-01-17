<?php

namespace MyCompany\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', ['label' => 'Naslov'] )
            ->add('time', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', ['label' => 'Vreme'] )
            ->add('location', 'Symfony\Component\Form\Extension\Core\Type\TextType', ['label' => 'Lokacija'] )
            ->add('body', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', ['label' => 'Tekst'] )
            ->add('preview', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', ['label' => 'Preview'] )
            ->add(
                'progres',
                'Symfony\Component\Form\Extension\Core\Type\RangeType',
                ['label' => 'progres od 0-100%'],
                [ 'attr' => ['min' => 1,'max' => 100] ]
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyCompany\ArticleBundle\Entity\Article'
        ));
    }
}
