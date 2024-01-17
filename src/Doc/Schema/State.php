<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

class State implements DocPropertiesInterface, DocGeneratorInterface
{

    use PropertyToTrait;
    use GeneratorHydratorTrait;

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $status = 0;

    /**
     * @var Array<<Period>> | array
     */
    protected $periods = [];

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return State
     */
    public function setType(?string $type): State
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return State
     */
    public function setName(string $name): State
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return State
     */
    public function setStatus(int $status): State
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param array|[] $periods
     * @return State
     */
    public function setPeriods(array $periods): State
    {
        $this->periods = $periods;
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
            'status' => $this->status,
            'periods' => $this->periods,
            'name' => $this->name,
            'type' => $this->type
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getType',
            'setType',
            'getName',
            'setName',
            'getStatus',
            'setStatus',
            'getPeriods',
            'setPeriods',
        ];
    }


}
