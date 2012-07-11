<?php

namespace J2\Bundle\ExchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('sku')
            ->add('createdAt')
            ->add('createdBy')
            ->add('active')
            ->add('updatedAt')
            ->add('updatedBy')
            ->add('companyID')
        ;
    }

    public function getName()
    {
        return 'j2_bundle_exchangebundle_productstype';
    }
}
