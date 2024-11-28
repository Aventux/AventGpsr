<?php declare(strict_types=1);

namespace Avent\Gpsr\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1732785591ProductManufacturerGpsrTranslation extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1732785591;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
    CREATE TABLE IF NOT EXISTS `product_manufacturer_gpsr_translation` (
        `product_manufacturer_gpsr_id` BINARY(16) NOT NULL,
        `language_id` BINARY(16) NOT NULL,
        `description` LONGTEXT NULL,
        `created_at` DATETIME(3) NOT NULL,
        `updated_at` DATETIME(3) NOT NULL,
        PRIMARY KEY (`product_manufacturer_gpsr_id`, `language_id`),
        CONSTRAINT `fk.manufacturer_gpsr_translation.product_manufacturer_gpsr_id`
            FOREIGN KEY (`product_manufacturer_gpsr_id`)
            REFERENCES `product_manufacturer_gpsr` (`id`)
            ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT `fk.manufacturer_gpsr_translation.language_id`
            FOREIGN KEY (`language_id`)
            REFERENCES `language` (`id`)
            ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
');
    }
}
