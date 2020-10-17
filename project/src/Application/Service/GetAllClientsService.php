<?php

namespace Forex4you\Application\Service;

use Forex4you\Application\DTO\ClientDto;
use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Model\Client;

/**
 * Class GetAllClientsService
 * @package Forex4you\Application\Service
 */
class GetAllClientsService
{
    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * GetAllClientsService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @return ClientDto[]
     */
    public function execute(): array
    {
        $clients = $this->clientCollection->findAll();

        return array_map(function (Client $client) {
            return ClientDto::createFromClient($client);
        }, $clients);
    }
}