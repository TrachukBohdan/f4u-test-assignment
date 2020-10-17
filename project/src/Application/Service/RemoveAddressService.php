<?php

namespace Forex4you\Application\Service;

/**
 * Class RemoveAddressService
 * @package Forex4you\Application\Service
 */
class RemoveAddressService
{
    /**
     * @var \Forex4you\Domain\Service\RemoveAddressService
     */
    private $removeAddressService;

    /**
     * RemoveAddressService constructor.
     * @param \Forex4you\Domain\Service\RemoveAddressService $removeAddressService
     */
    public function __construct(\Forex4you\Domain\Service\RemoveAddressService $removeAddressService)
    {
        $this->removeAddressService = $removeAddressService;
    }

    /**
     * @param string $clientId
     * @param int $addressPosition
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(string $clientId, int $addressPosition): void
    {
        $this->removeAddressService->execute($clientId, $addressPosition);
    }
}