<?php

namespace Forex4you\Application\Service;

use Forex4you\Contracts\ClientCollectionInterface;

/**
 * Class RemoveClientService
 * @package Forex4you\Application\Service
 */
class RemoveAllClientsService
{
    /**
     * @var \Forex4you\Domain\Service\RemoveClientService
     */
    private $removeClientService;

    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * RemoveClientService constructor.
     * @param ClientCollectionInterface $clientCollection
     * @param \Forex4you\Domain\Service\RemoveClientService $removeClientService
     */
    public function __construct(
        ClientCollectionInterface $clientCollection,
        \Forex4you\Domain\Service\RemoveClientService $removeClientService
    ) {
        $this->clientCollection = $clientCollection;
        $this->removeClientService = $removeClientService;
    }

    /**
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(): void
    {
        $clients = $this->clientCollection->findAll();

        foreach ($clients as $client) {
            $this->removeClientService->execute($client->getId());
        }
    }
}