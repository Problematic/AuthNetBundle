<?php

namespace Problematic\AuthNetBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Problematic\AuthNetBundle\Model\SubscriptionInterface;

class FilterArbSubscriptionEvent extends Event
{
    
    protected $subscription;
    protected $postVars;
    
    public function __construct(SubscriptionInterface $subscription, array $postVars)
    {
        $this->subscription = $subscription;
        $this->postVars = $postVars;
    }
    
    public function getRequest()
    {
        return $this->postVars;
    }
    
    public function setSubscription(SubscriptionInterface $subscription)
    {
        $this->subscription = $subscription;
    }
    
    public function getSubscription()
    {
        return $this->subscription;
    }

}
