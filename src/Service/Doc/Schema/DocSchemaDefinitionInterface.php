<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

/**
 * Interface DocSchemaDefinitionInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
interface DocSchemaDefinitionInterface
{

    /**
     * @return array
     */
    public function toArray() : array;
}
