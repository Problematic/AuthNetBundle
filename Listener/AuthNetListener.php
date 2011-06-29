<?php

namespace Problematic\AuthNetBundle\Listener;

use Problematic\AuthNetBundle\Event\FilterArbSubscriptionEvent;

abstract class AuthNetListener
{
    
    protected $em;
    protected $securityContext;
    
    public function __construct($em, $securityContext)
    {
        $this->em = $em;
        $this->securityContext = $securityContext;
    }
    
    public function onArbPreCreateSubscription(FilterArbSubscriptionEvent $event)
    {
    }

}
