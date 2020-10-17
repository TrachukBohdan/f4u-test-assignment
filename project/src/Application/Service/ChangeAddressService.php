<?php

namespace Forex4you\Application\Service;

use Forex4you\Application\DTO\AddressDto;

/**
 * Class ChangeAddressService
 * @package Forex4you\Application\Service
 */
class ChangeAddressService
{
    /**
     * @var \Forex4you\Domain\Service\ChangeAddressService
     */
    private $changeAddressService;

    /**
     * ChangeAddressService constructor.
     * @param \Forex4you\Domain\Service\ChangeAddressService $changeAddressService
     */
    public function __construct(\Forex4you\Domain\Service\ChangeAddressService $changeAddressService)
    {
        $this->changeAddressService = $changeAddressService;
    }

    /**
     * @param string $clientId
     * @param int $addressPosition
     * @param AddressDto $addressDto
     * @throws \Forex4you\Domain\Exception\ChangeShippingAddressException
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(string $clientId, int $addressPosition, AddressDto $addressDto): void
    {
        $this->changeAddressService->execute($clientId, $addressPosition, $addressDto);
    }
}