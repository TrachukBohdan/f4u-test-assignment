<?php

namespace Forex4you\Application\DTO;

use Forex4you\Domain\Model\Client;
use Forex4you\Domain\Model\ShippingAddress;

class ClientDto
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var null|AddressDto
     */
    private $defaultShippingAddress;

    /**
     * @var AddressDto[]
     */
    private $shippingAddresses;

    /**
     * ClientDto constructor.
     * @param string $clientId
     * @param string $firstName
     * @param string $lastName
     * @param AddressDto|null $defaultShippingAddress
     * @param AddressDto[] $shippingAddresses
     */
    public function __construct(
        string $clientId,
        string $firstName,
        string $lastName,
        ?AddressDto $defaultShippingAddress,
        array $shippingAddresses
    ) {
        $this->clientId = $clientId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->defaultShippingAddress = $defaultShippingAddress;
        $this->shippingAddresses = $shippingAddresses;
    }

    /**
     * @param Client $client
     * @return ClientDto
     */
    public static function createFromClient(Client $client): ClientDto
    {
        $defaultAddress = null;

        if ($client->getDefaultShippingAddress() !== null) {
            $defaultAddress = AddressDto::createFromShippingAddress(
                $client->getDefaultShippingAddress()
            );
        }

        $addresses = [];

        foreach ($client->getShippingAddresses() as $shippingAddress) {
            $addresses[] = AddressDto::createFromShippingAddress($shippingAddress);
        }

        return new ClientDto(
            $client->getId(),
            $client->getFirstName(),
            $client->getLastName(),
            $defaultAddress,
            $addresses
        );
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return AddressDto|null
     */
    public function getDefaultShippingAddress(): ?AddressDto
    {
        return $this->defaultShippingAddress;
    }

    /**
     * @return AddressDto[]
     */
    public function getShippingAddresses(): array
    {
        return $this->shippingAddresses;
    }


}