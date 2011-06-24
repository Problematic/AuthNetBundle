<?php

namespace Problematic\AuthNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Problematic\AuthNetBundle\AuthorizeNet\Shared\DataType\AuthorizeNet_Subscription;
use Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetARB;

class ArbController extends Controller
{

    public function createSubscriptionAction()
    {
        $request = $this->getRequest();
        $subscription = new AuthorizeNet_Subscription();
        $form = $this->createForm($type, $subscription, $options);
        
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            
            $arbRequest = new AuthorizeNetARB();
            $response = $arbRequest->createSubscription($subscription);
            if ($response->isOk()) {
                $subscriptionId = $response->getSubscriptionId();
            }
            
            // todo: redirect to success page
        }
        
        return new \Symfony\Component\HttpFoundation\Response();
    }
    
    public function updateSubscriptionAction()
    {
        
    }
    
    public function getSubscriptionStatusAction()
    {
        
    }
    
    public function cancelSubscriptionAction()
    {
        
    }
    
}
