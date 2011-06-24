<?php

namespace Problematic\AuthNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SubscriptionType extends AbstractType
{
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNet_Subscription',
        );
    }
    
}
