<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

class Status implements \JsonSerializable
{

    /**
     * @var string
     */
    protected $language;

    /**
     * @var int
     */
    protected $value;

}
