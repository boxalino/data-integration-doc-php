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
    use PropertyToTrait;
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(
            [
                'language' => $this->language,
                'country_code' => $this->country_code
            ],
            $this->_toArrayPropertiesTechnical()
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getLanguage',
                'setLanguage',
                'getCountryCode',
                'setCountryCode'
            ],
            $this->_toArrayTechnicalClassMethods()
        );
    }


}
