<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\DocIntegrationTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Languages\Doc;

/**
 * Class DocLanguages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocLanguages implements DocLanguagesHandlerInterface
{

    use DocIntegrationTrait;

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocLanguagesHandlerInterface::DOC_TYPE;
    }

}
