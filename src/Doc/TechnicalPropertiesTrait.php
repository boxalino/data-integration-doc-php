<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Trait TechnicalPropertiesTrait
 * These properties exist for every doc structure
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait TechnicalPropertiesTrait
{

    /**
     * technical field
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string
     */
    protected $creation_tm;

    /**
     * technical field
     * @var int
     */
    protected $client_id = 0;

    /**
     * technical field
     * @var int
     */
    protected $src_sys_id = 0;

    /**
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string | null $creation_tm
     * @return self
     */
    public function setCreationTm(?string $creation_tm): self
    {
        $this->creation_tm = is_null($creation_tm) ? date("Y-m-d H:i:s") : date("Y-m-d H:i:s", strtotime($creation_tm));
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     * @return self
     */
    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSrcSysId(): int
    {
        return $this->src_sys_id;
    }

    /**
     * @param int $src_sys_id
     * @return self
     */
    public function setSrcSysId(int $src_sys_id): self
    {
        $this->src_sys_id = $src_sys_id;
        return $this;
    }

}
