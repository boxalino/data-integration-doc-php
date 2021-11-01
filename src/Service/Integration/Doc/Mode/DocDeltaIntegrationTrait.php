<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\DeltaIntegrationInterface;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode
 */
trait DocDeltaIntegrationTrait
{

    /**
     * @var null
     */
    protected $syncCheck = null;

    /**
     * @param string|null $value
     * @return DocDeltaIntegrationInterface
     */
    public function setSyncCheck(?string $value = null) : DocDeltaIntegrationInterface
    {
        $this->syncCheck = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSyncCheck() : ?string
    {
        return $this->syncCheck;
    }

    /**
     * @return bool
     */
    public function filterByCriteria() : bool
    {
        if($this->getDiConfiguration()->getMode() === DeltaIntegrationInterface::INTEGRATION_MODE)
        {
            return true;
        }

        return false;
    }

}
