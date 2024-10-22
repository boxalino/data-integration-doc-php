<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Framework\Integrate\DiLoggerTrait;
use Boxalino\DataIntegrationDoc\Service\Flow\DiLogTrait;
use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Service\Flow\CoreTrait;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;

/**
 * Class Core
 *
 * Generic handler for core request
 * It has a data provider that returns the required result.
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
#[\AllowDynamicProperties]
abstract class Core implements HandlerInterface
{
    use LoadTrait;
    use CoreTrait;
    use DiLoggerTrait, DiLogTrait {
        DiLoggerTrait::getLogger insteadof DiLogTrait;
    }

    protected string $type;
    protected string $format = "json";
    protected string $writeDisposition = "WRITE_TRUNCATE";
    protected string $destination;
    protected ?string $schema = null;
    protected ?string $primaryField = null;
    protected bool $autodetect = true;

    public function __construct(
        LoggerInterface $logger,
        DataProviderInterface $dataProvider,
        string $type,
        string $destination,
        ?string $writeDisposition = "WRITE_TRUNCATE",
        ?string $primaryField = null,
        ?string $schema = null
    ){
        $this->logger = $logger;
        $this->dataProvider = $dataProvider;
        $this->type = $type;
        $this->destination = $destination;
        $this->primaryField = $primaryField;
        $this->writeDisposition = $writeDisposition;
        $this->schema = $schema;
        if($schema !== null) {
            $this->autodetect = false;
        }
    }


    /**
     * Gets data from the handler
     * Loads to GCS
     *
     * @return void
     */
    public function integrate(): void
    {
        $this->logInfo("Exporting data for {$this->type}.");
        $this->load($this->getDocContent(), "{$this->type}.{$this->format}");
        $this->logInfo("Export done for {$this->type}.");
    }

    public function getDocContent() : string
    {
        $data = [];
        foreach($this->getDataProvider()->getData() as $row)
        {
            $data[] = json_encode($row);
        }

        $this->logInfo(count($data) . " rows have content for " . $this->type);
        return implode("\n", $data);
    }

    /**
     * @return DataProviderInterface
     */
    protected function getDataProvider() : DataProviderInterface
    {
        return $this->dataProvider;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return $this->type;
    }

    /**
     * It will create the JSON body for the CORE request
     * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/928874497/DI-SAAS+ELT+Flow#The-DI-SAAS--CORE-request
     *
     * @return string
     */
    public function getCoreContent() : string
    {
        return json_encode([
            [
                "connector" => [
                    "type" => "boxalino",
                    "load" => [
                        "options" => [
                            "format" => $this->_getFormat(),
                            "delimiter" => "|",
                            "autodetected" => $this->autodetect,
                            "schema" => $this->schema ?? "",
                            "max_bad_records" => 0,
                            "skip_rows" => 0,
                            "write_disposition"=> $this->writeDisposition,
                            "create_disposition" => "",
                            "encoding"=>""
                        ],
                        "doc_{$this->type}" => [
                            "{$this->type}" => [
                                [
                                    "source" => "{$this->type}*.{$this->format}",
                                    "autodetect" => $this->autodetect,
                                    "schema" => $this->schema ?? "",
                                    "destination"=> $this->destination
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }

    /**
     * @return string
     */
    protected function _getFormat() : string
    {
        return "NEWLINE_DELIMITED_JSON";
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject) : HandlerInterface
    {
        $this->diConfiguration = $configurationDataObject;
        return $this;
    }


}
