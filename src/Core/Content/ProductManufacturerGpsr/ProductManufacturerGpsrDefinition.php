<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr;

use Avent\Gpsr\Core\Content\ProductManufacturerGpsr\Aggregate\ProductManufacturerGpsrTranslationDefinition;
use Shopware\Core\Content\Product\Aggregate\ProductManufacturer\ProductManufacturerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductManufacturerGpsrDefinition extends EntityDefinition
{
    protected const ENTITY_NAME = 'product_manufacturer_gpsr';

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
    public function getEntityClass(): string
    {
        return ProductManufacturerGpsrEntity::class;
    }

    /**
     * @return FieldCollection
     */
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey(), new ApiAware()),
            (new FkField('product_manufacturer_id', 'productManufacturerId', ProductManufacturerDefinition::class))->addFlags(new Required(), new ApiAware()),
            (new ReferenceVersionField(ProductManufacturerDefinition::class, 'product_manufacturer_version_id'))->addFlags(new Required()),
            (new TranslationsAssociationField(ProductManufacturerGpsrTranslationDefinition::class, 'product_manufacturer_gpsr_id'))->addFlags(new ApiAware(), new Required()),
            (new TranslatedField('description'))->addFlags(new ApiAware()),

            (new OneToOneAssociationField('productManufacturer', 'product_manufacturer_id', 'id', ProductManufacturerDefinition::class, false)),

            (new CreatedAtField()),
            (new UpdatedAtField())
        ]);
    }
}