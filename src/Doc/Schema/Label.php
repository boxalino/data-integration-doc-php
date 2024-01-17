<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

class Label extends Tag
{

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
     * @return Label
     */
    public function setName(string $name): Label
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(parent::toArrayList(), [
            'name' => $this->name
        ]);
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(parent::toArrayClassMethods(), [
            'getName',
            'setName',
        ]);
    }


}
