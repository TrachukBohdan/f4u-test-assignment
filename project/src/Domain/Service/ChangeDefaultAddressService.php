<?php

namespace Forex4you\Domain\Service;

use Forex4you\Application\DTO\AddressDto;
use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Exception\ClientNotFoundException;
use Forex4you\Domain\Model\ShippingAddress;

class ChangeDefaultAddressService
{
    /**
     * @var ClientCollectionInterface
     */
    private $clientCollection;

    /**
     * ChangeAddressService constructor.
     * @param ClientCollectionInterface $clientCollection
     */
    public function __construct(ClientCollectionInterface $clientCollection)
    {
        $this->clientCollection = $clientCollection;
    }

    /**
     * @param string $clientId
     * @param AddressDto $addressDto
     * @throws ClientNotFoundException
     */
    public function execute(string $clientId, AddressDto $addressDto): void
    {
        $client = $this->clientCollection->find($clientId);

        if (null === $client) {
            throw new ClientNotFoundException("Client with id: {$clientId} was not found");
        }

        $newShippingAddress = ShippingAddress::createFromAddress(
            $addressDto->getCountry(),
            $addressDto->getCity(),
            $addressDto->getZipcode(),
            $addressDto->getStreet()
        );

        $client->changeDefaultAddress($newShippingAddress);
        $this->clientCollection->update($client);
    }
}