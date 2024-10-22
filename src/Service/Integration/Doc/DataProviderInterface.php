<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

/**
 * Interface DataProviderInterface
 * Service responsible to provide data to a handler
 * 
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DataProviderInterface
{
    /**
     * Returns an array of data that can be used by a property handler
     * @return array
     */
    public function getData() : array;

}
