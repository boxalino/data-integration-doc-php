<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\InstantIntegrationInterface;

/**
 * Interface DocInstantIntegrationTrait
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode\Doc
 */
trait DocInstantIntegrationTrait
{

    /**
     * @var array
     */
    protected $ids = [];

    /**
     * @var
     */
    protected $instantMode = false;

    /**
     * @return array
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * @param array $ids
     * @return DocInstantIntegrationInterface
     */
    public function setIds(array $ids): DocInstantIntegrationInterface
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * @return bool
     */
    public function filterByIds() : bool
    {
        if($this->getDiConfiguration()->getMode() === InstantIntegrationInterface::INTEGRATION_MODE)
        {
            return true;
        }

        return false;
    }

    /**
     * @param $value
     * @return DocInstantIntegrationInterface
     */
    public function allowInstantMode($value) : DocInstantIntegrationInterface
    {
        if($value === "true" || $value=== "1")
        {
            $this->instantMode = true;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function hasModeEnabled() : bool
    {
        return $this->instantMode;
    }


}
