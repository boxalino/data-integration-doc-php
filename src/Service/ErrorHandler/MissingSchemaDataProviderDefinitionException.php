<?php
namespace Boxalino\DataIntegrationDoc\Service\ErrorHandler;

/**
 * Class MissingSchemaDataProviderDefinitionException
 * @package Boxalino\DataIntegrationDoc\Service\ErrorHandler
 */
class MissingSchemaDataProviderDefinitionException extends \Error
{
    /**
     * {@inheritdoc}
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 0, null);
    }
}
