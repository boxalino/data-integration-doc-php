<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\Schema\Contact;
use Boxalino\DataIntegrationDoc\Doc\Schema\User\Contact as UserContact;

class User extends Contact implements DocPropertiesInterface
{
    use DocPropertiesTrait;

    /**
     * default contacts like for billing and shipping
     *
     * @var Array<<UserContact>>
     */
    protected $contacts = [];

    /**
     * technical field
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
     * @return array|[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array|[] $contacts
     * @return User
     */
    public function setContacts(array $contacts): User
    {
        foreach($contacts as $contact)
        {
            if($contact instanceof UserContact)
            {
                $this->contacts[] = $contact->toArray();
                continue;
            }

            $this->contacts[] = $contact;
        }
        return $this;
    }

    /**
     * @param UserContact $contact
     * @return $this
     */
    public function addContacts(UserContact $contact) : User
    {
        $this->contacts[] = $contact->toArray();
        return $this;
    }


    /**
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string $created_tm
     * @return User
     */
    public function setCreationTm(string $created_tm): User
    {
        $this->creation_tm = $created_tm;
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
     * @return User
     */
    public function setClientId(int $client_id): User
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
     * @return User
     */
    public function setSrcSysId(int $src_sys_id): User
    {
        $this->src_sys_id = $src_sys_id;
        return $this;
    }


}
