<?php

namespace Vivait\CRMBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType {
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'address';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        return $builder
            ->add('line1', 'text')
            ->add('line2', 'text')
            ->add('town', 'text')
            ->add('county', 'text')
            ->add('postcode', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
                'data_class'=>'\Vivait\CRMBundle\Entity\Address',
            ]);
    }


} 