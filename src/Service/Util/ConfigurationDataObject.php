<?php
namespace Boxalino\DataIntegrationDoc\Service\Util;

use Boxalino\DataIntegrationDoc\Service\Util\AbstractSimpleObject;

/**
 * Class ConfigurationDataObject
 *
 * @package Boxalino\DataIntegrationDoc\Service\Util
 */
class ConfigurationDataObject extends AbstractSimpleObject
{

    /**
     * @return string|null
     */
    public function getEndpoint() : ?string
    {
        return $this->_get("endpoint");
    }

    /**
     * @return string|null
     */
    public function getAccount() : ?string
    {
        return $this->_get("account");
    }

    /**
     * @return string|null
     */
    public function getApiKey() : ?string
    {
        return $this->_get("apiKey");
    }

    /**
     * @return string|null
     */
    public function getApiSecret() : ?string
    {
        return $this->_get("apiSecret");
    }

    /**
     * @return bool|null
     */
    public function isDev() : ?bool
    {
        return $this->_get("isDev") ?? false;
    }

    /**
     * @return bool
     */
    public function isTest() : bool
    {
        return $this->_get("isTest") ?? false;
    }

    /**
     * @return string|null
     */
    public function getType() : ?string
    {
        return $this->_get("type");
    }

    /**
     * @return string|null
     */
    public function getProject() : ?string
    {
        return $this->_get("project");
    }

    /**
     * @return string|null
     */
    public function getDataset() : ?string
    {
        return $this->_get("dataset");
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->_data;
    }

}
