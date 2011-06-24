<?php

namespace Problematic\AuthNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetSubscription;
use Problematic\AuthNetBundle\AuthorizeNet\API\ARB\AuthorizeNetARB;
use Problematic\AuthNetBundle\Entity\Subscription;
use Problematic\AuthNetBundle\Form\SubscriptionType;

class ArbController extends Controller
{

    public function createSubscriptionAction()
    {        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $subscription = new AuthorizeNetSubscription();
        $form = $this->createForm(new SubscriptionType(), $subscription);
        
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            
            $postVars = $request->request->get('subscription');
            
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
