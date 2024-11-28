<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class ProductManufacturerGpsrCollection extends EntityCollection
{

    /**
     * @return string
     */
    public function getApiAlias(): string
    {
        return 'product_manufacturer_gpsr_collection';
    }

    /**
     * @return string
     */
    protected function getExpectedClass(): string
    {
        return ProductManufacturerGpsrEntity::class;
    }

}