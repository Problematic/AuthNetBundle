<?php

namespace Problematic\AuthNetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddressType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $required = 'shipping' == $options['address_type'] ? true : false;
        
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('company', 'text', array('required'=>false));
        $builder->add('address', 'text', array('required'=>$required));
        $builder->add('city', 'text', array('required'=>$required));
        $builder->add('state', 'text', array('required'=>$required));
        $builder->add('zip', 'text', array('required'=>$required));
        $builder->add('country', 'text', array('required'=>$required));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Problematic\AuthNetBundle\Model\Address',
            'address_type' => $options['address_type'],
        );
    }

}