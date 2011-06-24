<?php

namespace Problematic\AuthNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Problematic\AuthNetBundle\AuthorizeNet\Shared\DataType\AuthorizeNet_Subscription;
use Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetARB;
use Problematic\AuthNetBundle\Entity\Subscription;

class ArbController extends Controller
{

    public function createSubscriptionAction()
    {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw new AccessDeniedException();
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $subscription = new AuthorizeNet_Subscription();
        $form = $this->createForm($type, $subscription, $options);
        
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            
            if ($form->isValid()) {
                $create_request = new AuthorizeNetARB();
                $create_request->setRefId($this->get('security.context')->getToken()->getUser()->getId());
                $response = $create_request->createSubscription($subscription);

                if ($response->isOk()) {
                    $subscription = new Subscription();
                    $subscription->setSubscriptionId($response->getSubscriptionId());
                    $subscription->setRefId($response->getRefID());

                    $em->persist($subscription);
                    $em->flush();
                } else {
                    
                }
            }
            
            // todo: redirect to success page
        }
        
        return $this->render('ProblematicAuthNetBundle:Arb:createSubscription.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function updateSubscriptionAction()
    {
        
    }
    
    public function getSubscriptionStatusAction(Subscription $subscription)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $status_request = new AuthorizeNetARB();
        $response = $status_request->getSubscriptionStatus($subscription->getSubscriptionId());
        
        if ($response->isOk()) {
            $status = $response->getSubscriptionStatus();
            $subscription->setStatus($status);
            $em->flush();
        } else {
            
        }
        
        return new \Symfony\Component\HttpFoundation\Response();
    }
    
    public function cancelSubscriptionAction(Subscription $subscription)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $cancellation_request = new AuthorizeNetARB();
        $cancellation_request->setRefId($subscription->getRefId());
        $response = $cancellation_request->cancelSubscription($subscription->getSubscriptionId());
        
        if ($response->isOk()) {
            $subscription->setStatus($response->getSubscriptionStatus());
            $em->flush();
        } else {
            
        }
        
        return new \Symfony\Component\HttpFoundation\Response();
    }
    
}
