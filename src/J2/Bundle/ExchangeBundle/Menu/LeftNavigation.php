<?php

/**
 * Left Primary Navigations
 */

namespace J2\Bundle\ExchangeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class LeftNavigation extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array('childrenAttributes' => array('id' => 'menu')));

        $menu->addChild('Dashboard', array('route' => '_dashboard', 'attributes' => array('class' => 'dash')));
        $menu->addChild('Catalog', array('route' => '_products', 'attributes' => array('class' => 'products')));
        $menu->addChild('Offers', array('route' => '_offers', 'attributes' => array('class' => 'offers')));

        return $menu;
    }
}