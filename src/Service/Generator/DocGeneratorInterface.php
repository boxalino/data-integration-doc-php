<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator;

/**
 * Interface DocGeneratorInterface
 * @package Boxalino\InstantUpdate\Service\Generator
 */
interface DocGeneratorInterface
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

}
