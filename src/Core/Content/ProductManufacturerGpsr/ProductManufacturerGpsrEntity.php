<?php

namespace Avent\Gpsr\Core\Content\ProductManufacturerGpsr;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ProductManufacturerGpsrEntity extends Entity
{
    use EntityIdTrait;

    protected ?string $description;

    protected string $productManufacturerId;
    protected string $productManufacturerVersionId;

    /**
     * @return string
     */
    public function getProductManufacturerId(): string
    {
        return $this->productManufacturerId;
    }

    /**
     * @param string $productManufacturerId
     * @return void
     */
    public function setProductManufacturerId(string $productManufacturerId): void
    {
        $this->productManufacturerId = $productManufacturerId;
    }

    /**
     * @return string
     */
    public function getProductManufacturerVersionId(): string
    {
        return $this->productManufacturerVersionId;
    }

    /**
     * @param string $productManufacturerVersionId
     * @return void
     */
    public function setProductManufacturerVersionId(string $productManufacturerVersionId): void
    {
        $this->productManufacturerVersionId = $productManufacturerVersionId;
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