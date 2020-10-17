<?php

namespace Forex4you\Infrastructure\Collection;

use Forex4you\Contracts\ClientCollectionInterface;
use Forex4you\Domain\Model\Client;

/**
 * Class ClientCollection
 * @package Forex4you\Infrastructure\Collection
 */
class ClientCollection implements ClientCollectionInterface
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * ClientCollection constructor.
     * @param string $filePath
     * @throws \Exception
     */
    public function __construct(string $filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception('DB file does not exist');
        }

        $this->filePath = $filePath;
    }

    /**
     * @param Client $client
     */
    public function add(Client $client): void
    {
        $content = file_get_contents($this->filePath);
        $clients = [];

        if (!empty($content)) {
            $clients = unserialize($content);
        }

        $clients[] = $client;
        $content = serialize($clients);
        file_put_contents($this->filePath, $content);
    }

    /**
     * @param Client $removeClient
     */
    public function remove(Client $removeClient): void
    {
        $content = file_get_contents($this->filePath);
        $clients = [];

        if (!empty($content)) {
            $clients = unserialize($content);
        }

        /**
         * @var $clients Client[]
         */
        foreach($clients as $clientKey =>  $client) {
            if ($client->getId() === $removeClient->getId()) {
                unset($clients[$clientKey]);
                break;
            }
        }

        $content = serialize($clients);
        file_put_contents($this->filePath, $content);
    }

    /**
     * @param Client $updateClient
     */
    public function update(Client $updateClient): void
    {
        $content = file_get_contents($this->filePath);
        $clients = [];

        if (!empty($content)) {
            $clients = unserialize($content);
        }

        /**
         * @var $clients Client[]
         */
        foreach($clients as $clientKey =>  $client) {
            if ($client->getId() === $updateClient->getId()) {
                $clients[$clientKey] = $updateClient;
                break;
            }
        }

        $content = serialize($clients);
        file_put_contents($this->filePath, $content);
    }

    /**
     * @param string $id
     * @return Client|null
     */
    public function find(string $id): ?Client
    {
        $content = file_get_contents($this->filePath);
        $clients = [];

        if (!empty($content)) {
            $clients = unserialize($content);
        }

        /**
         * @var $clients Client[]
         */
        foreach($clients as $clientKey =>  $client) {
            if ($client->getId() === $id) {
                return $client;
            }
        }

        return null;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $content = file_get_contents($this->filePath);
        $clients = [];

        if (!empty($content)) {
            $clients = unserialize($content);
        }

        return $clients;
    }
}