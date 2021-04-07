<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

/**
 * Interface ProductIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface ProductIntegrationHandlerInterface
    extends IntegrationHandlerInterface
{

    public const INTEGRATION_TYPE="product";

    public const INTEGRATION_MODE="F";

}