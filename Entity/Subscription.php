<?php

namespace Problematic\AuthNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Problematic\AuthNetBundle\Model\Subscription as BaseSubscription;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class Subscription extends BaseSubscription
{
    
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
    protected $status;
    
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
