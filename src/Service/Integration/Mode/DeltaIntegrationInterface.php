<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
interface DeltaIntegrationInterface
{

    public const INTEGRATION_MODE = "D";

    /**
     * @return string|null
     */
   public function syncCheck() : ?string;


}
