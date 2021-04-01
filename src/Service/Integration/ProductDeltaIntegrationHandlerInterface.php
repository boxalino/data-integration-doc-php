<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

/**
 * Interface ProductDeltaIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface ProductDeltaIntegrationHandlerInterface
    extends IntegrationHandlerInterface
{

    public const INTEGRATION_TYPE="product";

    public const INTEGRATION_MODE="D";

}
