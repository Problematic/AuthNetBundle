<?php

namespace Problematic\AuthNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddressType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $type = $options['address_type'];
        $required = 'shipTo' == $type ? true : false;
        
        $builder->add('first_name', 'text', array(
            'property_path' => "{$type}FirstName",
        ));
        $builder->add('last_name', 'text', array(
            'property_path' => "{$type}LastName",
        ));
        $builder->add('company', 'text', array(
            'required' => false,
            'property_path' => "{$type}Company",
        ));
        $builder->add('address', 'text', array(
            'required' => $required,
            'property_path' => "{$type}Address",
        ));
        $builder->add('city', 'text', array(
            'required'=>$required,
            'property_path' => "{$type}City",
        ));
        $builder->add('state', 'text', array(
            'required'=>$required,
            'property_path' => "{$type}State",
        ));
        $builder->add('zip', 'text', array(
            'required'=>$required,
            'property_path' => "{$type}Zip",
        ));
        $builder->add('country', 'text', array(
            'required'=>$required,
            'property_path' => "{$type}Country",
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'address_type' => $options['address_type'],
//            'data_class' => 'Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetSubscription',
        );
    }

}