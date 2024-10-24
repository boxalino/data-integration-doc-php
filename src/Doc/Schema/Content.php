<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Content implements DocPropertiesInterface
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
    protected $content_type;

    /**
     * @var string | null
     */
    protected $content_id;

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
    public function getContentType(): ?string
    {
        return $this->content_type;
    }

    /**
     * @param string|null $content_type
     * @return Content
     */
    public function setContentType(?string $content_type): Content
    {
        $this->content_type = $content_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentId(): ?string
    {
        return $this->content_id;
    }

    /**
     * @param string|null $content_id
     * @return Content
     */
    public function setContentId(?string $content_id): Content
    {
        $this->content_id = $content_id;
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'type' => $this->type,
            'content_type' => $this->content_type,
            'content_id' => $this->content_id,
            'value' => $this->value,
            'name' => $this->name
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
            'getContentId',
            'setContentId',
            'getContentType',
            'setContentType',
            'getValue',
            'setValue',
            'getName',
            'setName'
        ];
    }


}
