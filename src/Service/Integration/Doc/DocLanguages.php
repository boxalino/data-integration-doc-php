<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Languages\Doc;

/**
 * Class DocLanguages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocLanguages implements DocLanguagesHandlerInterface
{

    use DocGeneratorTrait;

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocLanguagesHandlerInterface::DOC_TYPE;
    }

}
