<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createSidebarMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('sidebar', ['childrenAttributes' => ['class' => 'sidebar-elements']]);

        $menu->addChild('MENU', ['attributes' => ['class' => 'divider']]);
        $menu->addChild('Foi de parcurs', ['route' => 'waybills-index']);
        $menu->addChild('Foi de parcurs incomplete', ['route' => 'waybills-incomplete']);
        //$menu->addChild('Foi de parcurs anulate', ['route' => 'waybills-anulate']);
        $menu->addChild('Comenzi', ['route' => 'wayorders-index']);

        $menu->addChild('EXPORT', ['attributes' => ['class' => 'divider']]);
        $menu->addChild('Tabel Pontaj', ['route' => 'export-tabelpontaj']);
        $menu->addChild('Raport BEB', ['route' => 'export-raportbeb']);
        $menu->addChild('Raport Autogari', ['route' => 'export-autogari']);

        $menu->addChild('STATISTICA', ['attributes' => ['class' => 'divider']]);
        $menu->addChild('Plan', ['route' => 'statistics-plan']);
        $menu->addChild('Motorina', ['route' => 'statistics-motorina']);
        $menu->addChild('Venit', ['route' => 'statistics-venit']);

        return $menu;
    }
}