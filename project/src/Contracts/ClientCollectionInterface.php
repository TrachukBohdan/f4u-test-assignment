<?php

namespace Forex4you\Contracts;

use Forex4you\Domain\Model\Client;

/**
 * Interface ClientCollectionInterface
 * @package Forex4you\Contracts
 */
interface ClientCollectionInterface
{
    /**
     * @param Client $client
     */
    public function add(Client $client): void;

    /**
     * @param Client $client
     */
    public function remove(Client $client): void;

    /**
     * @param Client $client
     */
    public function update(Client $client): void;

    /**
     * @param string $id
     * @return Client|null
     */
    public function find(string $id): ?Client;

    /**
     * @return Client[]
     */
    public function findAll(): array;
}