<?php

namespace Problematic\AuthNetBundle\AuthorizeNet\Shared\DataType;

/**
 * A class that contains all fields for a CIM Transaction Line Item.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetCIM
 */
class AuthorizeNetLineItem
{
    public $itemId;
    public $name;
    public $description;
    public $quantity;
    public $unitPrice;
    public $taxable;

}
