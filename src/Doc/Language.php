<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Class Language
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280975/doc+languages
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
class Language implements DocPropertiesInterface
{
    use DocPropertiesTrait;
    use TechnicalPropertiesTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $country_code;


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


}
