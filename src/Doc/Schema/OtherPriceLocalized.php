<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class OtherPriceLocalized extends PriceLocalized
    implements DocPropertiesInterface
{
    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return self
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    protected function toArrayList(): array
    {
        return array_merge(
            parent::toArrayList(),
            [
                'type' => $this->type,
                'region' => $this->region
            ]
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getType',
                'setType',
                'getRegion',
                'setRegion'
            ],
            parent::toArrayClassMethods()
        );
    }



}
