<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\Languages\Doc;

/**
 * Interface DocLanguagesHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
interface DocLanguagesHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_languages";

}
