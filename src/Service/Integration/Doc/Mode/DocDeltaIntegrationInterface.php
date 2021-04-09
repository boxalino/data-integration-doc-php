<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode\Doc
 */
interface DocDeltaIntegrationInterface
{

    /**
     * @return bool
     */
    public function filterByCriteria() : bool;

    /**
     * @return string | null
     */
    public function getSyncCheck() : ?string;

    /**
     * @param string | null $check
     * @return DocDeltaIntegrationInterface
     */
    public function setSyncCheck(?string $check = null) : DocDeltaIntegrationInterface;


}
