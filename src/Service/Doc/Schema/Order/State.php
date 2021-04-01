<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema\Order;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

class State implements DocPropertiesInterface
{

    use DocPropertiesTrait;

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


}
