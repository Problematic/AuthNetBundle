<?php

namespace Problematic\AuthNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Problematic\AuthNetBundle\Form\AddressType;

class SubscriptionType extends AbstractType
{
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('creditCardCardNumber');
        $builder->add('creditCardExpirationDate', 'date', array(
            'input'     => 'datetime',
            'widget'    => 'single_text',
            'format'    => \IntlDateFormatter::SHORT,
        ));
        $builder->add('creditCardCardCode', 'text', array(
            'required'  => false,
        ));
        
        $builder->add('customerEmail', 'email', array(
            'required'  => false,
        ));
        $builder->add('customerPhoneNumber', 'text', array(
            'required'  => false,
        ));
        
        $builder->add('billToFirstName');
        $builder->add('billToLastName');
        $builder->add('billToCompany', 'text', array(
            'required'  => false,
        ));
        $builder->add('billToAddress', 'text', array(
            'required'  => false,
        ));
        $builder->add('billToCity', 'text', array(
            'required'  => false,
        ));
        $builder->add('billToState', 'text', array(
            'required'  => false,
        ));
        $builder->add('billToZip', 'text', array(
            'required'  => false,
        ));
        $builder->add('billToCountry', 'text', array(
            'required'  => false,
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetSubscription',
        );
    }
    
}
