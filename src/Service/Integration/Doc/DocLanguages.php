<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Languages\Doc;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerIntegrationTrait;
use Psr\Log\LoggerInterface;

/**
 * Class DocLanguages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
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

    /**
     * Languages are exported following the simple load strategy
     * (small data load)
     */
    public function integrate(): void
    {
       $document = $this->getDocContent();
       $this->load($document, $this->getDocType());
    }

}
