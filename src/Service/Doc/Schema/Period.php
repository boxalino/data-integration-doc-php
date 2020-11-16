<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

/**
 * Class Period
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Period implements \JsonSerializable
{

    /**
     * @var Array<<Localized>>
     */
    protected $start_datetime;

    /**
     * @var Array<<Localized>>
     */
    protected $end_datetime;

    /**
     * @return Array
     */
    public function getStartDatetime(): array
    {
        return $this->start_datetime;
    }

    /**
     * @param Array $start_datetime
     * @return Period
     */
    public function setStartDatetime(array $start_datetime): Period
    {
        $this->start_datetime = $start_datetime;
        return $this;
    }

    /**
     * @return Array
     */
    public function getEndDatetime(): array
    {
        return $this->end_datetime;
    }

    /**
     * @param Array $end_datetime
     * @return Period
     */
    public function setEndDatetime(array $end_datetime): Period
    {
        $this->end_datetime = $end_datetime;
        return $this;
    }


}
