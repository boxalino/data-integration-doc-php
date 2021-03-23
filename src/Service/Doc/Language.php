<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;

/**
 * Class Language
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280975/doc+languages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
class Language implements DocPropertiesInterface
{
    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $country_code;

    /**
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string (timestamp)
     */
    protected $creation_tm;

    /**
     * @var int
     */
    protected $client_id = 0;

    /**
     * @var int
     */
    protected $src_sys_id = 0;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Language
     */
    public function setLanguage(string $language): Language
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * @param string $country_code
     * @return Language
     */
    public function setCountryCode(string $country_code): Language
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string $creation_tm
     * @return Language
     */
    public function setCreationTm(string $creation_tm): Language
    {
        $this->creation_tm = $creation_tm;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     * @return Language
     */
    public function setClientId(int $client_id): Language
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSrcSysId(): int
    {
        return $this->src_sys_id;
    }

    /**
     * @param int $src_sys_id
     * @return Language
     */
    public function setSrcSysId(int $src_sys_id): Language
    {
        $this->src_sys_id = $src_sys_id;
        return $this;
    }


}
