<?php

namespace Problematic\AuthNetBundle\Model;

interface SubscriptionInterface
{
    
    public function getId();
    
    public function setSubscriptionId($subscription_id);
    
    public function getSubscriptionId();
    
    public function getSubscriberId();
    
    public function setStatus($status);
    
    public function getStatus();

}
