<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

class Content implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

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


}
