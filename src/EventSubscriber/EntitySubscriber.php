<?php

namespace App\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class EntitySubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::preRemove,
        );
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();

        if ($entity instanceof \App\Entity\AppEntity) {
            if (property_exists($entity, 'archived')){

                $entity->canceled = true;
                $entityManager->persist($entity);
                $entityManager->flush($entity);

                $entityManager->detach($entity);

                return ;
            }
        }
    }
}