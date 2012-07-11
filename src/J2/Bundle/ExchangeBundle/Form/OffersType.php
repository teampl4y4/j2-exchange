<?php

namespace J2\Bundle\ExchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('companyID')
            ->add('name')
            ->add('description')
            ->add('listPrice')
            ->add('whisperPrice')
            ->add('createdAt')
            ->add('createdBy')
            ->add('updatedAt')
            ->add('updatedBy')
            ->add('active')
            ->add('productID')
            ->add('available')
        ;
    }

    public function getName()
    {
        return 'j2_bundle_exchangebundle_offerstype';
    }
}
