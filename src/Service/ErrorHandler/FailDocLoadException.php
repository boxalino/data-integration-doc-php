<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class FailDocLoadException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class FailDocLoadException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
