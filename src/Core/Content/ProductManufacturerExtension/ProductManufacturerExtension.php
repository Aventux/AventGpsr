<?php
namespace Avent\Gpsr\Core\Content\ProductManufacturerExtension;

use Avent\Gpsr\Core\Content\ProductManufacturerGpsr\ProductManufacturerGpsrDefinition;
use Shopware\Core\Content\Product\Aggregate\ProductManufacturer\ProductManufacturerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductManufacturerExtension extends EntityExtension
{

    /**
     * @param FieldCollection $collection
     * @return void
     */
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField('productManufacturerGpsr', 'id', 'product_manufacturer_id', ProductManufacturerGpsrDefinition::class, false)
        );
    }

    /**
     * @return string
     */
    public function getDefinitionClass(): string
    {
        return ProductManufacturerDefinition::class;
    }
}