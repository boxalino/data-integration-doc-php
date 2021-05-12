<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\Schema\Contact;
use Boxalino\DataIntegrationDoc\Doc\Schema\User\Contact as UserContact;

class User extends Contact implements DocPropertiesInterface
{
    use DocPropertiesTrait;
    use TechnicalPropertiesTrait;

    /**
     * default contacts like for billing and shipping
     *
     * @var Array<<UserContact>>
     */
    protected $contacts = [];

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


}
