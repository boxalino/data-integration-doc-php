<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Contact;
use Boxalino\DataIntegrationDoc\Doc\Schema\User\Contact as UserContact;

/**
 * doc_user data structure
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252182638/doc+user
 */
class User extends Contact implements DocPropertiesInterface
{
    use PropertyToTrait;
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(
            parent::toArrayList(),
            [
                'contacts' => $this->contacts
            ],
            $this->_toArrayPropertiesTechnical()
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods(): array
    {
        return array_merge(
            [
                'getContacts',
                'setContacts',
                'addContacts'
            ],
            $this->_toArrayTechnicalClassMethods(),
            parent::toArrayClassMethods()
        );
    }


}
