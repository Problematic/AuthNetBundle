<?php

namespace Problematic\AuthNetBundle\AuthorizeNet\API\ARB;

use Problematic\AuthNetBundle\AuthorizeNet\Shared\AuthorizeNetXMLResponse;

/**
 * A class to parse a response from the ARB XML API.
 *
 * @package    AuthorizeNet
 * @subpackage AuthorizeNetARB
 */
class AuthorizeNetARBResponse extends AuthorizeNetXMLResponse
{

    /**
     * @return int
     */
    public function getSubscriptionId()
    {
        return $this->_getElementContents("subscriptionId");
    }
    
    /**
     * @return string
     */
    public function getSubscriptionStatus()
    {
        return $this->_getElementContents("Status");
    }

}
