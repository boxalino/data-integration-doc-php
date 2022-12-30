<?php /** @noinspection GrazieInspection */
declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Interface IntegrationHandlerInterface
 * Integration per strategy: product, user, content, etc
 * For ex: in the case of prodyct data integration - more doc types are required
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface IntegrationHandlerInterface
{

    /**
     * Sync request once all handlers have loaded their content
     */
    public function integrate() : void;

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return IntegrationHandlerInterface
     */
    public function manageConfiguration(ConfigurationDataObject $configurationDataObject) : IntegrationHandlerInterface;

    /**
     * Handlers are managing the export of every DOC structure, as documented
     * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280881/Data+Structure
     *
     * @param DocHandlerInterface $docHandler
     * @return DocHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface;

    /**
     * Get handlers for every doc type required for the given data integration strategy
     *
     * @return \ArrayObject
     */
    public function getHandlers() : \ArrayObject;

    /**
     * Describe the integration type (product, user, order, etc)
     *
     * @return string
     */
    public function getIntegrationType() : string;

    /**
     * Describe the integration strategy (F, I, D)
     *
     * @return string
     */
    public function getIntegrationMode() : string;

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration() : ConfigurationDataObject;


}
