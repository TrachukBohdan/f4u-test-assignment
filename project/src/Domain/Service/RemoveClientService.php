<?php

namespace Forex4you\Domain\Service;

use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Exception\ClientNotFoundException;

/**
 * Class RemoveClientService
 * @package Forex4you\Domain\Service
 */
class RemoveClientService
{
    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * RemoveClientService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @param string $clientId
     * @throws ClientNotFoundException
     */
    public function execute(string $clientId): void
    {
        $client = $this->clientCollection->find($clientId);

        if (null === $client) {
            throw new ClientNotFoundException("Client with id: {$clientId} was not found");
        }

        $this->clientCollection->remove($client);
    }
}