<?php

namespace Problematic\AuthNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Problematic\AuthNetBundle\Form\AddressType;

class SubscriptionType extends AbstractType
{
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        
        $builder->add('billTo', new AddressType(), array(
            'address_type' => 'billTo',
        ));
        $builder->add('shipTo', new AddressType(), array(
            'address_type' => 'shipTo',
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetSubscription',
        );
    }
    
}
