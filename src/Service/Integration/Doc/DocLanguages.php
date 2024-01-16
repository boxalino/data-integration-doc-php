<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\Languages\Doc;
use Psr\Log\LoggerInterface;

/**
 * Class DocLanguages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
#[\AllowDynamicProperties]
class DocLanguages implements DocLanguagesHandlerInterface
{
    use DocHandlerIntegrationTrait;
    use LoadTrait;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocLanguagesHandlerInterface::DOC_TYPE;
    }

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return new Doc($data);
    }


}
