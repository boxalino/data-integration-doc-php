<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\User;

use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;
use Boxalino\DataIntegrationDoc\Doc\Schema\Contact as ContactSchema;

class Contact extends ContactSchema implements  DocGeneratorInterface
{
    use GeneratorHydratorTrait;

}
