<?php

namespace Forex4you\Application\Service;

/**
 * Class CreateClientService
 * @package Forex4you\Application\Service
 */
class CreateClientService
{
    /**
     * @var \Forex4you\Domain\Service\CreateClientService
     */
    private $createClientService;

    /**
     * CreateClientService constructor.
     * @param \Forex4you\Domain\Service\CreateClientService $createClientService
     */
    public function __construct(\Forex4you\Domain\Service\CreateClientService $createClientService)
    {
        $this->createClientService = $createClientService;
    }

    /**
     * @param string $clientId
     * @param string $firstName
     * @param string $lastName
     */
    public function execute(string $clientId, string $firstName, string $lastName): void
    {
        $this->createClientService->execute($clientId, $firstName, $lastName);
    }
}