<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class MissingRequiredPropertyException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class MissingRequiredPropertyException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 0, null);
    }
}
