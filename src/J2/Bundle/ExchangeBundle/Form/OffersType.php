<?php

namespace J2\Bundle\ExchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('listPrice')
            ->add('whisperPrice')
            ->add('active')
            ->add('available')
            ->add('product', 'entity', array(
    'class' => 'J2ExchangeBundle:Product',
    'query_builder' => function($repository) { return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC'); },
    'property' => 'name'))
        ;
    }

    public function getName()
    {
        return 'j2_bundle_exchangebundle_offerstype';
    }
}
