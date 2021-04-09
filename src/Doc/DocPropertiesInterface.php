<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Interface DocPropertiesInterface
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
interface DocPropertiesInterface extends \JsonSerializable
{

    /**
     * @return array
     */
    public function toArray() : array;
}
