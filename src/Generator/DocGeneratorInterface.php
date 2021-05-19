<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator;

/**
 * Interface DocGeneratorInterface
 * Implement in order to dynamically generate each doc_X content type line/row
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
interface DocGeneratorInterface extends \JsonSerializable
{

    /**
     * @param array $data
     * @return DocGeneratorInterface | null
     */
    public function toObject(array $data) : ?DocGeneratorInterface;

    /**
     * @return array
     */
    public function toArray() : array;

    /**
     * @return array
     */
    public function toList() : array;


}
