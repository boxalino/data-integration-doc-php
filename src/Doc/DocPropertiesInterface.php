<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Interface DocPropertiesInterface
 * All document properties data structures must implement this interface
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
interface DocPropertiesInterface extends \JsonSerializable
{

    /**
     * @return array
     */
    public function toArray() : array;

    /**
     * @return array
     */
    public function toList() : array;


}
