<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Period
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Period implements DocPropertiesInterface
{

    use PropertyToTrait;

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
        foreach($start_datetime as $value)
        {
            if($value instanceof Localized)
            {
                $this->start_datetime[] = $value->toArray();
                continue;
            }

            $this->start_datetime[] = $value;
        }

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
        foreach($end_datetime as $value)
        {
            if($value instanceof Localized)
            {
                $this->end_datetime[] = $value->toArray();
                continue;
            }

            $this->end_datetime[] = $value;
        }
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'end_datetime' => $this->end_datetime,
            'start_datetime' => $this->start_datetime
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getEndDateTime',
            'setEndDateTime',
            'getStartDateTime',
            'setStartDateTime'
        ];
    }


}
