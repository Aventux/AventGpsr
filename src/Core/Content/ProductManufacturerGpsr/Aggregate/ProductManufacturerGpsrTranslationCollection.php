<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr\Aggregate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class ProductManufacturerGpsrTranslationCollection extends EntityCollection
{

    /**
     * @return string
     */
    public function getApiAlias(): string
    {
        return 'product_manufacturer_gpsr_translation_collection';
    }

    /**
     * @return string
     */
    protected function getExpectedClass(): string
    {
        return ProductManufacturerGpsrTranslationEntity::class;
    }

}