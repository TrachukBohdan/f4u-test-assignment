<?php

namespace Forex4you\Domain\Service;

use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Exception\ClientNotFoundException;

class RemoveAddressService
{
    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * RemoveAddressService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @param string $clientId
     * @param int $addressPosition
     * @throws ClientNotFoundException
     */
    public function execute(string $clientId, int $addressPosition): void
    {
        $client = $this->clientCollection->find($clientId);

        if (null === $client) {
            throw new ClientNotFoundException("Client with id: {$clientId} was not found");
        }

        foreach ($client->getShippingAddresses() as $index => $shippingAddress) {
            if ($index !== $addressPosition) {
                continue;
            }

            $client->removeShippingAddress($shippingAddress);
        }

        $this->clientCollection->update($client);
    }
}