<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr\Aggregate;

use Avent\Gpsr\Core\Content\ProductManufacturerGpsr\ProductManufacturerGpsrEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class ProductManufacturerGpsrTranslationEntity extends TranslationEntity
{
    use EntityIdTrait;

    protected ?string $description;
    protected string $productManufacturerGpsrId;
    protected ProductManufacturerGpsrEntity $productManufacturerGpsr;

    /**
     * @return string
     */
    public function getProductManufacturerGpsrId(): string
    {
        return $this->productManufacturerGpsrId;
    }

    /**
     * @param string $productManufacturerGpsrId
     * @return void
     */
    public function setProductManufacturerGpsrId(string $productManufacturerGpsrId): void
    {
        $this->productManufacturerGpsrId = $productManufacturerGpsrId;
    }

    /**
     * @return ProductManufacturerGpsrEntity
     */
    public function getProductManufacturerGpsr(): ProductManufacturerGpsrEntity
    {
        return $this->productManufacturerGpsr;
    }

    /**
     * @param ProductManufacturerGpsrEntity $productManufacturerGpsr
     * @return void
     */
    public function setProductManufacturerGpsr(ProductManufacturerGpsrEntity $productManufacturerGpsr): void
    {
        $this->productManufacturerGpsr = $productManufacturerGpsr;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}