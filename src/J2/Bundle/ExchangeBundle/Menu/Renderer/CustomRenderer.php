<?php

namespace J2\Bundle\ExchangeBundle\Menu\Renderer;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\MatcherInterface;
use Knp\Menu\Renderer\ListRenderer;

/**
 * Renders navigation with a <span>..</span> around the anchor text
 */
class CustomRenderer extends ListRenderer implements \Knp\Menu\Renderer\RendererInterface
{
    protected function renderLinkElement(ItemInterface $item, array $options)
    {
        return sprintf('<a href="%s"%s><span>%s</span></a>',
            $this->escape($item->getUri()),
            $this->renderHtmlAttributes($item->getLinkAttributes()),
            $this->renderLabel($item, $options));
    }

    protected function renderItem(ItemInterface $item, array $options)
    {
        return parent::renderItem($item, $options);
    }

}