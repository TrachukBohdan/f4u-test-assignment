<?php

namespace Forex4you\Domain\Service;

use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Model\Client;

/**
 * Class CreateClientService
 * @package Forex4you\Domain\Service
 */
class CreateClientService
{
    /**
     * @var ClientCollectionInterface
     */
    public $clientCollection;

    /**
     * CreateClientService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @param string $clientId
     * @param string $firstName
     * @param string $lastName
     */
    public function execute(string $clientId, string $firstName, string $lastName): void
    {
        $client = Client::createFromFullName($clientId, $firstName, $lastName);
        $this->clientCollection->add($client);
    }
}