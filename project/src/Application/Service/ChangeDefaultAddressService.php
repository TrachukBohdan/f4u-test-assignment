<?php

namespace Forex4you\Application\Service;

use Forex4you\Application\DTO\AddressDto;

/**
 * Class ChangeDefaultAddressService
 * @package Forex4you\Application\Service
 */
class ChangeDefaultAddressService
{
    private $changeDefaultAddressService;

    /**
     * ChangeDefaultAddressService constructor.
     * @param \Forex4you\Domain\Service\ChangeDefaultAddressService $changeDefaultAddressService
     */
    public function __construct(\Forex4you\Domain\Service\ChangeDefaultAddressService $changeDefaultAddressService)
    {
        $this->changeDefaultAddressService = $changeDefaultAddressService;
    }

    /**
     * @param string $clientId
     * @param AddressDto $addressDto
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(string $clientId, AddressDto $addressDto): void
    {
        $this->changeDefaultAddressService->execute($clientId, $addressDto);
    }
}