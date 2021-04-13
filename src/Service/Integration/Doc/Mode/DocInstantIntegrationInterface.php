<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode;

/**
 * Interface InstantIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
interface DocInstantIntegrationInterface
{

    /**
     * @return array
     */
    public function getIds() : array;

    /**
     * @param array $ids
     * @return DocInstantIntegrationInterface
     */
    public function setIds(array $ids) : DocInstantIntegrationInterface;

    /**
     * @return bool
     */
    public function filterByIds() : bool;

    /**
     * @return bool
     */
    public function hasModeEnabled() : bool;

    /**
     * @param $value
     * @return DocInstantIntegrationInterface
     */
    public function allowInstantMode($value) : DocInstantIntegrationInterface;

}
