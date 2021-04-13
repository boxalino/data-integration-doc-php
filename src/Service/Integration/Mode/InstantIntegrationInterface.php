<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

/**
 * Interface InstantIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
interface InstantIntegrationInterface
{

    public const INTEGRATION_MODE="I";

    /**
     * @return array
     */
    public function getIds() : array;

    /**
     * @param array $ids
     * @return InstantIntegrationInterface
     */
    public function setIds(array $ids) : InstantIntegrationInterface;


}
