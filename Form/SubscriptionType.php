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
        $builder->add('creditCardCardCode');
        
        $builder->add('customerId');
        $builder->add('customerEmail');
        $builder->add('customerPhoneNumber');
        $builder->add('customerFaxNumber');
        
        $builder->add('billToFirstName');
        $builder->add('billToLastName');
        $builder->add('billToCompany');
        $builder->add('billToAddress');
        $builder->add('billToCity');
        $builder->add('billToState');
        $builder->add('billToZip');
        $builder->add('billToCountry', 'country', array(
            'preferred_choices' => array('us'),
        ));
        
        $builder->add('shipToFirstName');
        $builder->add('shipToLastName');
        $builder->add('shipToCompany');
        $builder->add('shipToAddress');
        $builder->add('shipToCity');
        $builder->add('shipToState');
        $builder->add('shipToZip');
        $builder->add('shipToCountry', 'country', array(
            'preferred_choices' => array('us'),
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetSubscription',
        );
    }
    
}
