<?php

namespace Forex4you\Domain\Model;

use Forex4you\Domain\Exception\AddShippingAddressException;
use Forex4you\Domain\Exception\ChangeShippingAddressException;
use Forex4you\Domain\Exception\InvalidFieldValueException;

/**
 * Class Client
 * @package Forex4you\Domain
 */
class Client
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var ShippingAddress
     */
    private $defaultShippingAddress;

    /**
     * @var array
     */
    private $shippingAddresses;

    private function __construct(){}

    /**
     * Client constructor.
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @return Client
     * @throws InvalidFieldValueException
     */
    public static function createFromFullName(string $id, string $firstName, string $lastName): Client
    {
        $client = new Client();
        $client->id = $id;
        $client->setFirstName($firstName);
        $client->setLastName($lastName);
        $client->defaultShippingAddress = null;
        $client->shippingAddresses = [];

        return $client;
    }

    /**
     * @param string $firstName
     * @throws InvalidFieldValueException
     */
    private function setFirstName(string $firstName): void
    {
        if (empty($firstName)) {
            throw new InvalidFieldValueException('First name cannot be empty');
        }

        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     * @throws InvalidFieldValueException
     */
    private function setLastName(string $lastName): void
    {
        if (empty($lastName)) {
            throw new InvalidFieldValueException('Last name cannot be empty');
        }

        $this->lastName = $lastName;
    }



    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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

    public function getDefaultShippingAddress(): ?ShippingAddress
    {
        return $this->defaultShippingAddress;
    }

    public function getShippingAddresses(): array
    {
        return $this->shippingAddresses;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @throws \Exception
     */
    public function addShippingAddress(ShippingAddress $shippingAddress): void
    {
        if (count($this->shippingAddresses) >= 2) {
            throw new AddShippingAddressException(
                'Cannot add more than 2 extra shipping addresses'
            );
        }

        if (null == $this->defaultShippingAddress) {
            $this->defaultShippingAddress = $shippingAddress;
            return;
        }

        $this->shippingAddresses[] = $shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     */
    public function removeShippingAddress(ShippingAddress $shippingAddress): void
    {
        foreach ($this->shippingAddresses as $index => $clientShippingAddress) {
            if ($clientShippingAddress->isEqual($shippingAddress)) {
                unset($this->shippingAddresses[$index]);
                return;
            }
        }
    }

    /**
     * @param int $position
     * @param ShippingAddress $address
     * @throws ChangeShippingAddressException
     */
    public function changeShippingAddress(int $position, ShippingAddress $address): void
    {
        if ($position > count($this->shippingAddresses)) {
            throw new ChangeShippingAddressException('Cannot find address by position: '. $position);
        }

        $this->shippingAddresses[$position] = $address;
    }

    /**
     * @param ShippingAddress $address
     */
    public function changeDefaultAddress(ShippingAddress $address): void
    {
        $this->defaultShippingAddress = $address;
    }
}