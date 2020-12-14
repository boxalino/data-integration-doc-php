<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Integration\DocIntegrationTrait;
use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\Languages\Doc;

/**
 * Class DocLanguages
 *
 * @package Boxalino\InstantUpdate\Service\Integration
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
