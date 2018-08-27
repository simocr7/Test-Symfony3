<?php

namespace vente\achatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                 ->add('nom',TextType::class,array(
                    'attr' =>array('class'=>'nom'),
                    'label_attr'=>array('class'=>'nom'),
                ))
                ->add('description',TextType::class,array(
                    'attr' =>array('class'=>'description'),
                    'label_attr'=>array('class'=>'description'),
                ))
                 ->add('prix',IntegerType::class,array(
                    'attr' =>array('class'=>'prix'),
                    'label_attr'=>array('class'=>'prix'),
                )) ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vente\achatBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vente_achatbundle_produit';
    }


}
