<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;

/**
 * Interface DocHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocHandlerInterface
{

    /**
     * @return string
     */
    public function getDoc() : string;

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
