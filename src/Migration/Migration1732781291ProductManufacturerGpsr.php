<?php declare(strict_types=1);

namespace Avent\Gpsr\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1732781291ProductManufacturerGpsr extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1732781291;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
        CREATE TABLE IF NOT EXISTS `product_manufacturer_gpsr` (
            `id` BINARY(16) NOT NULL,
            `product_manufacturer_id` BINARY(16) NOT NULL,
            `product_manufacturer_version_id` BINARY(16) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NOT NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `fk.product_manufacturer_gpsr.product_manufacturer_id`
                FOREIGN KEY (`product_manufacturer_id`, `product_manufacturer_version_id`)
                REFERENCES `product_manufacturer` (`id`, `version_id`)
                ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ');
    }

    public function updateDestructive(Connection $connection): void
    {
        $connection->executeStatement('DROP TABLE IF EXISTS `product_manufacturer_gpsr`;');
    }
}
