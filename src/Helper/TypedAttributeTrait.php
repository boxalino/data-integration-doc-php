<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Helper;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;

/**
 * Trait TypedAttributeTrait
 *
 * @package Boxalino\DataIntegrationDoc\Helper
 */
trait TypedAttributeTrait
{

    public function getGenericTypedAttributes() : array
    {
        return [
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
        ];
    }

    /**
     * @return array
     */
    public function getTypedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_DATETIME,
        ];
    }

    /**
     * @return array
     */
    public function getTypedLocalizedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
            DocSchemaInterface::FIELD_BRANDS,
            DocSchemaInterface::FIELD_SUPPLIERS,
        ];
    }


}
