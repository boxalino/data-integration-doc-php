<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

/**
 * Interface ProductInstantIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface ProductInstantIntegrationHandlerInterface
    extends IntegrationHandlerInterface
{

    public const INTEGRATION_TYPE="product";

    public const INTEGRATION_MODE="I";
}
