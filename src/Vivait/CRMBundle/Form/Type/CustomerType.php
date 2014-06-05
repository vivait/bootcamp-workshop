<?php

namespace Vivait\CRMBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType {
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'customer';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        return $builder
            ->add('forename', 'text')
            ->add('surname', 'text')
            ->add('dob', 'date',['label'=>'Date of Birth','input_wrapper_class'=>null,'separator_wrapper_class'=>null,'widget'=>'single_text'])
            ->add('addresses','collection',[
                    'type'=>'address',
                    'allow_add'=>true,
                    'allow_delete'=>true,
                    'by_reference'=>false,
                    'options'=>[
                        'label_render'=>false
                    ]
                ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
                'data_class'=>'\Vivait\CRMBundle\Entity\Customer',
            ]);
    }


} 