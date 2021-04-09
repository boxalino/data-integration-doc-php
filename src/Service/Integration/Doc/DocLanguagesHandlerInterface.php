<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\Languages\Doc;

/**
 * Interface DocLanguagesHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocLanguagesHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_language";

}
