<?php

namespace Forex4you\Application\Service;

use Forex4you\Application\DTO\ClientDto;
use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Exception\ClientNotFoundException;

/**
 * Class GetClientService
 * @package Forex4you\Application\Service
 */
class GetClientService
{
    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * GetClientService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @param string $clientId
     * @return ClientDto
     * @throws ClientNotFoundException
     */
    public function execute(string $clientId): ClientDto
    {
        $client = $this->clientCollection->find($clientId);

        if (null === $client) {
            throw new ClientNotFoundException("Client with id: {$clientId} was not found");
        }

        return ClientDto::createFromClient($client);
    }
}