<?php

namespace Dbout\Bundle\SymfonyHelperBundle\EventListener\Entity;

use Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent\CreatedAtEntity;
use Dbout\Bundle\SymfonyHelperBundle\Entity\DoctrineEvent\UpdatedAtEntity;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

/**
 * Class EntitySubscriber
 * @package Dbout\Bundle\SymfonyHelperBundle\EventListener\Entity
 */
class EntitySubscriber implements EventSubscriber
{

    /**
     * @return array|string[]
     */
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \Exception
     */
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getObject();
        $this->createdAt($entity);
        $this->updatedAt($entity);
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \Exception
     */
    public function preUpdate(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getObject();
        $this->updatedAt($entity);
    }

    /**
     * @param $object
     * @throws \Exception
     */
    private function updatedAt($object): void
    {
        if($object instanceof UpdatedAtEntity) {
            $object->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * @param $object
     * @throws \Exception
     */
    private function createdAt($object): void
    {
        if($object instanceof CreatedAtEntity && empty($object->getCreatedAt())) {
            $object->setCreatedAt(new \DateTime('now'));
        }
    }

}