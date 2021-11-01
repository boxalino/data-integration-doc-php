<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Period
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Period implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var Array<<Localized>>
     */
    protected $start_datetime = [];

    /**
     * @var Array<<Localized>>
     */
    protected $end_datetime = [];

    /**
     * @return array
     */
    public function getStartDatetime(): array
    {
        return $this->start_datetime;
    }

    /**
     * @param array $start_datetime
     * @return Period
     */
    public function setStartDatetime(array $start_datetime): Period
    {
        $this->start_datetime = $start_datetime;
        return $this;
    }

    /**
     * @return array
     */
    public function getEndDatetime(): array
    {
        return $this->end_datetime;
    }

    /**
     * @param array $end_datetime
     * @return Period
     */
    public function setEndDatetime(array $end_datetime): Period
    {
        $this->end_datetime = $end_datetime;
        return $this;
    }


}
