<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;

/**
 * Class TypedLocalized
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 * Can be used for: brands, suppliers, <typed>_localized properties
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class TypedLocalized extends RepeatedLocalized
    implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


}
