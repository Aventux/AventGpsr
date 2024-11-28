<?php

namespace Avent\Gpsr\Subscriber;

use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductDetailPageSubscriber implements EventSubscriberInterface
{

    /**
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageCriteriaEvent::class => 'onProductPageCriteria'
        ];
    }

    /**
     * @param ProductPageCriteriaEvent $event
     * @return void
     */
    public function onProductPageCriteria(ProductPageCriteriaEvent $event): void
    {
        $criteria = $event->getCriteria();
        $criteria->addAssociation('manufacturer.productManufacturerGpsr');
    }
}