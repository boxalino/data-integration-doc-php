<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Customer implements DocPropertiesInterface
{

    use PropertyToTrait;

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var string | null
     */
    protected $name;

    /**
     * @var string | null
     */
    protected $persona_id;

    /**
     * @var string | null
     */
    protected $customer_id;

    /**
     * @var int | null
     */
    protected $value;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Content
     */
    public function setType(?string $type): Content
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Content
     */
    public function setName(?string $name): Content
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonaId(): ?string
    {
        return $this->persona_id;
    }

    /**
     * @param string|null $personaId
     * @return Content
     */
    public function setPersonaId(?string $personaId): Content
    {
        $this->persona_id = $personaId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customer_id;
    }

    /**
     * @param string|null $customer_id
     * @return Content
     */
    public function setCustomerId(?string $customer_id): Content
    {
        $this->customer_id = $customer_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     * @return Content
     */
    public function setValue(?int $value): Content
    {
        $this->value = $value;
        return $this;
    }


}
