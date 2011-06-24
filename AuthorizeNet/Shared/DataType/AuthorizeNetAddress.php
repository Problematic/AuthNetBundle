<?php

namespace Problematic\AuthNetBundle\AuthorizeNet\Shared\DataType;
 
/**
 * A class that contains all fields for a CIM Address.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetCIM
 */
class AuthorizeNetAddress
{
    public $firstName;
    public $lastName;
    public $company;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $phoneNumber;
    public $faxNumber;
    public $customerAddressId;
}
