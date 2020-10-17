<?php

namespace Forex4you\Application\Service;

/**
 * Class RemoveClientService
 * @package Forex4you\Application\Service
 */
class RemoveClientService
{
    /**
     * @var \Forex4you\Domain\Service\RemoveClientService
     */
    private $removeClientService;

    /**
     * RemoveClientService constructor.
     * @param \Forex4you\Domain\Service\RemoveClientService $removeClientService
     */
    public function __construct(\Forex4you\Domain\Service\RemoveClientService $removeClientService)
    {
        $this->removeClientService = $removeClientService;
    }

    /**
     * @param string $clientId
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function execute(string $clientId): void
    {
        $this->removeClientService->execute($clientId);
    }
}