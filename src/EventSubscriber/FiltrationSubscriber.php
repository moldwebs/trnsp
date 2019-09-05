<?php

namespace App\EventSubscriber;

use Doctrine\ORM\Query;
use Knp\Component\Pager\Event\BeforeEvent;
use Knp\Component\Pager\Event\ItemsEvent;
use Knp\Component\Pager\Event\Subscriber\Filtration\Doctrine\ORM\QuerySubscriber;
use Knp\Component\Pager\Event\Subscriber\Filtration\PropelQuerySubscriber;
use Knp\Component\Pager\Event\Subscriber\Paginate\Doctrine\ORM\Query\Helper as QueryHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Components\WhereWalker;

class FiltrationSubscriber implements EventSubscriberInterface
{

    public function items(ItemsEvent $event)
    {
        if ($event->target instanceof Query) {
            if (!isset($_GET['filters']) || (empty($_GET['filters']))) {
                return;
            }
            $filters = $_GET['filters'];
            $filters = array_map(function ($value){
                return str_replace('*', '%', $value);
            }, $filters);
            $filters = array_filter($filters, function($value){
                return !empty($value);
            });
            $filters = array_map(function ($value){
                return "%{$value}%";
            }, $filters);

            $event->target
                ->setHint('knp_paginator.filter.filters', $filters);
            QueryHelper::addCustomTreeWalker($event->target, 'App\Components\WhereWalker');
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            'knp_pager.items' => array('items', 0),
        );
    }

}
