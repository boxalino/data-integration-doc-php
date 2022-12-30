<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class FailSyncException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class StopSyncException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
