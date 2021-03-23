<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc;

/**
 * Interface DocPropertiesInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
interface DocPropertiesInterface extends \JsonSerializable
{

    /**
     * @return array
     */
    public function toArray() : array;
}
