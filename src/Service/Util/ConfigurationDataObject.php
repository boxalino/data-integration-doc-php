<?php
namespace Boxalino\DataIntegrationDoc\Service\Util;

use Boxalino\DataIntegrationDoc\Service\GcpClientInterface;
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
        return $this->_get(GcpClientInterface::DI_REQUEST_TYPE);
    }

    /**
     * @return string|null
     */
    public function getProject() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_PROJECT);
    }

    /**
     * @return string|null
     */
    public function getDataset() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_DATASET);
    }

    /**
     * @return string|null
     */
    public function getTm() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_TM);
    }

    /**
     * @return string|null
     */
    public function getTs() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_TS);
    }

    /**
     * @return string|null
     */
    public function getMode() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_MODE);
    }

    /**
     * @return string|null
     */
    public function getChunk() : ?string
    {
        return $this->_get(GcpClientInterface::DI_REQUEST_CHUNK);
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
        $this->setData(GcpClientInterface::DI_REQUEST_TYPE, $type);
        return $this;
    }

    /**
     * @param string $tm
     * @return $this
     */
    public function setTm(string $tm) : self
    {
        $this->setData(GcpClientInterface::DI_REQUEST_TM, $tm);
        return $this;
    }

    /**
     * @param string $mode
     * @return $this
     */
    public function setMode(string $mode) : self
    {
        $this->setData(GcpClientInterface::DI_REQUEST_MODE, $mode);
        return $this;
    }

    /**
     * @param string $ts
     * @return $this
     */
    public function setTs(string $ts) : self
    {
        $this->setData(GcpClientInterface::DI_REQUEST_TS, $ts);
        return $this;
    }

    /**
     * @param string $chunk
     * @return $this
     */
    public function setChunk(string $chunk) : self
    {
        $this->setData(GcpClientInterface::DI_REQUEST_CHUNK, $chunk);
        return $this;
    }

}
