<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class NoRecordsFoundException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class NoRecordsFoundException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
