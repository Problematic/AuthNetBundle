<?php

namespace Problematic\AuthNetBundle\AuthorizeNet\Shared\DataType;

/**
 * A class that contains all fields for a CIM Payment Profile.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetCIM
 */
class AuthorizeNetPaymentProfile
{
    
    public $customerType;
    public $billTo;
    public $payment;
    public $customerPaymentProfileId;
    
    public function __construct()
    {
        $this->billTo = new AuthorizeNetAddress;
        $this->payment = new AuthorizeNetPayment;
    }

}