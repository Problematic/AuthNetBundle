<?php

namespace Problematic\AuthNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Subscription
{

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;
    /**
     * @ORM\Column(type="integer", length="13")
     */
    protected $subscription_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $ref_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    public function getId()
    {
        return $this->id;
    }
    
    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at = $created_at;
    }
    
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    
    public function setUpdatedAt(\DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }
    
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setSubscriptionId($subscription_id)
    {
        $this->subscription_id = $subscription_id;
    }

    public function getSubscriptionId()
    {
        return $this->subscription_id;
    }

    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }

    public function getRefId()
    {
        return $this->ref_id;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    public function __toString()
    {
        return $this->getSubscriptionId();
    }
    
}
