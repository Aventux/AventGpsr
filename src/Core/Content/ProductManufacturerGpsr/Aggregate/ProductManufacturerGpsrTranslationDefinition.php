<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr\Aggregate;

use Avent\Gpsr\Core\Content\ProductManufacturerGpsr\ProductManufacturerGpsrDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductManufacturerGpsrTranslationDefinition extends EntityTranslationDefinition
{
    protected const ENTITY_NAME = 'product_manufacturer_gpsr_translation';

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    /**
     * @return string
     */
    protected function getParentDefinitionClass(): string
    {
        return ProductManufacturerGpsrDefinition::class;
    }

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return ProductManufacturerGpsrTranslationEntity::class;
    }

    /**
     * @return FieldCollection
     */
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new LongTextField('description', 'description'))->addFlags(new ApiAware()),

            (new CreatedAtField()),
            (new UpdatedAtField())
        ]);
    }
}