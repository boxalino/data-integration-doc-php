<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class MissingConfigurationException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class MissingConfigurationException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
