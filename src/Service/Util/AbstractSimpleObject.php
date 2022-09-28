<?php
namespace Boxalino\DataIntegrationDoc\Service\Util;


/**
 * Base Class for simple data Objects
 */
abstract class AbstractSimpleObject
{
    /**
     * @var array
     */
    protected $_data = [];

    /**
     * Initialize internal storage
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->_data = $data;
    }

    /**
     * Dynamically add properties to the object
     *
     * @param string $methodName
     * @param null $params
     * @return $this
     */
    public function __call(string $methodName, $params = null)
    {
        $methodPrefix = substr($methodName, 0, 3);
        $key = strtolower(substr($methodName, 3, 1)) . substr($methodName, 4);
        if($methodPrefix == 'get')
        {
            try{
                return $this->_get($key);
            } catch (\Throwable $exception)
            {
                //do nothing, the property is simply not set.
            }
        }
    }

    /**
     * Retrieves a value from the data array if set, or null otherwise.
     *
     * @param string $key
     * @return mixed|null
     */
    protected function _get(string $key)
    {
        return $this->_data[$key] ?? null;
    }

    /**
     * Set value for the given key
     *
     * @param string $key
     * @param mixed $value
     */
    public function setData(string $key, $value) : self
    {
        $this->_data[$key] = $value;
        return $this;
    }


}
