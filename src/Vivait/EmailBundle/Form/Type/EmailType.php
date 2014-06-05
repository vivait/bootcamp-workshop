<?php

namespace Vivait\EmailBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType {
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'email';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        return $builder
            ->add('from', 'text')
            ->add('to', 'text')
            ->add('message', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
                'data_class'=>'\Vivait\EmailBundle\Model\Email',
            ]);
    }


} 