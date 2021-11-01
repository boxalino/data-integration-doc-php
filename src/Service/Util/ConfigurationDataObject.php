<?php
namespace Boxalino\DataIntegrationDoc\Service\Util;

use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;

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
        return $this->_get(DiConfigurationInterface::DI_CONFIG_ENDPOINT);
    }

    /**
     * @return string|null
     */
    public function getAccount() : ?string
    {
        return $this->_get(DiConfigurationInterface::DI_CONFIG_ACCOUNT);
    }

    /**
     * @return string|null
     */
    public function getApiKey() : ?string
    {
        return $this->_get(DiConfigurationInterface::DI_CONFIG_API_KEY);
    }

    /**
     * @return string|null
     */
    public function getApiSecret() : ?string
    {
        return $this->_get(DiConfigurationInterface::DI_CONFIG_API_SECRET);
    }

    /**
     * @return bool|null
     */
    public function isDev() : ?bool
    {
        return $this->_get(DiConfigurationInterface::DI_CONFIG_IS_DEV) ?? false;
    }

    /**
     * @return bool
     */
    public function isTest() : bool
    {
        return $this->_get(DiConfigurationInterface::DI_CONFIG_IS_TEST) ?? false;
    }

    /**
     * @return string|null
     */
    public function getType() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_TYPE);
    }

    /**
     * @return string|null
     */
    public function getProject() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_PROJECT);
    }

    /**
     * @return string|null
     */
    public function getDataset() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_DATASET);
    }

    /**
     * @return string|null
     */
    public function getTm() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_TM);
    }

    /**
     * @return string|null
     */
    public function getTs() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_TS);
    }

    /**
     * @return string|null
     */
    public function getMode() : ?string
    {
        return $this->_get(GcpRequestInterface::DI_REQUEST_MODE);
    }

    /**
     * @return string|null
     */
    public function getChunk() : ?string
    {
        return (int) $this->_get(GcpRequestInterface::DI_REQUEST_CHUNK);
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        return $this->_data;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type) : self
    {
        $this->setData(GcpRequestInterface::DI_REQUEST_TYPE, $type);
        return $this;
    }

    /**
     * @param string $tm
     * @return $this
     */
    public function setTm(string $tm) : self
    {
        $this->setData(GcpRequestInterface::DI_REQUEST_TM, $tm);
        return $this;
    }

    /**
     * @param string $mode
     * @return $this
     */
    public function setMode(string $mode) : self
    {
        $this->setData(GcpRequestInterface::DI_REQUEST_MODE, $mode);
        return $this;
    }

    /**
     * @param string $ts
     * @return $this
     */
    public function setTs(string $ts) : self
    {
        $this->setData(GcpRequestInterface::DI_REQUEST_TS, $ts);
        return $this;
    }

    /**
     * @param string|int $chunk
     * @return $this
     */
    public function setChunk($chunk) : self
    {
        $this->setData(GcpRequestInterface::DI_REQUEST_CHUNK, (int) $chunk);
        return $this;
    }


}
