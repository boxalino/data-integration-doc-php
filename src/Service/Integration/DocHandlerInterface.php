<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;

/**
 * Interface DocHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
interface DocHandlerInterface
{

    public function getDoc();

    /**
     * @param DocGeneratorInterface $doc
     */
    public function addDocLine(DocGeneratorInterface $doc);

    /**
     * @return string
     */
    public function getDocType() : string;

    /**
     * @param string $type
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocPropertySchema(string $type, array $data = []) : DocGeneratorInterface;

}
