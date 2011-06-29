<?php

namespace Problematic\AuthNetBundle\Model;

abstract class Subscription implements SubscriptionInterface
{
    
    protected $subscription_id;
    
    protected $status;
    
    public function setSubscriptionId($subscription_id)
    {
        $this->subscription_id = $subscription_id;
    }
    
    public function getSubscriptionId()
    {
        return $this->subscription_id;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

}
