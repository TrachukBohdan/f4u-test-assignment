<?php

namespace Forex4you\Application\Service;

use Forex4you\Application\DTO\AddressDto;

/**
 * Class AddAddressService
 * @package Forex4you\Application\Service
 */
class AddAddressService
{
    private $addAddressService;

    /**
     * AddAddressService constructor.
     * @param \Forex4you\Domain\Service\AddAddressService $addAddressService
     */
    public function __construct(\Forex4you\Domain\Service\AddAddressService $addAddressService)
    {
        $this->addAddressService = $addAddressService;
    }

    /**
     * @param string $clientId
     * @param AddressDto $addressDto
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(string $clientId, AddressDto $addressDto): void
    {
        $this->addAddressService->execute($clientId, $addressDto);
    }
}