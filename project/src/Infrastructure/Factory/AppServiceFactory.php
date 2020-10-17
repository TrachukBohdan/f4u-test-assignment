<?php

namespace Forex4you\Infrastructure\Factory;

use Forex4you\Application\Service\AddAddressService;
use Forex4you\Application\Service\ChangeAddressService;
use Forex4you\Application\Service\ChangeDefaultAddressService;
use Forex4you\Application\Service\CreateClientService;
use Forex4you\Application\Service\GetAllClientsService;
use Forex4you\Application\Service\GetClientService;
use Forex4you\Application\Service\RemoveAddressService;
use Forex4you\Application\Service\RemoveAllClientsService;
use Forex4you\Application\Service\RemoveClientService;
use Forex4you\Infrastructure\Config;

/**
 * Class AppServiceFactory
 * @package Forex4you\Infrastructure\Factory
 */
class AppServiceFactory
{
    /**
     * @return AddAddressService
     * @throws \Exception
     */
    public static function createAddAddress(): AddAddressService
    {
        $configs = Config::getConfigs();

        return new AddAddressService(
            new \Forex4you\Domain\Service\AddAddressService(
                new \Forex4you\Infrastructure\Collection\ClientCollection($configs['db-file'])
            )
        );
    }

    /**
     * @return CreateClientService
     * @throws \Exception
     */
    public static function createCreateClient(): CreateClientService
    {
        $configs = Config::getConfigs();
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection($configs['db-file']);
        $createClientService = new \Forex4you\Domain\Service\CreateClientService($clientCollection);
        $createClient = new CreateClientService($createClientService);
        return $createClient;
    }

    /**
     * @return RemoveAddressService
     * @throws \Exception
     */
    public static function createRemoveAddress(): RemoveAddressService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );
        $removeAddressService = new \Forex4you\Domain\Service\RemoveAddressService($clientCollection);
        $removeAddress = new RemoveAddressService($removeAddressService);
        return $removeAddress;
    }

    /**
     * @return GetAllClientsService
     * @throws \Exception
     */
    public static function createGetAllClients(): GetAllClientsService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );
        return new GetAllClientsService($clientCollection);

    }

    /**
     * @return GetClientService
     * @throws \Exception
     */
    public static function createGetClient(): GetClientService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );
        $getClient = new GetClientService($clientCollection);
        return $getClient;
    }

    /**
     * @return ChangeAddressService
     * @throws \Exception
     */
    public static function createChangeAddress(): ChangeAddressService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );
        $changeAddressService = new \Forex4you\Domain\Service\ChangeAddressService($clientCollection);
        $changeAddress = new ChangeAddressService($changeAddressService);
        return $changeAddress;
    }

    /**
     * @return ChangeDefaultAddressService
     * @throws \Exception
     */
    public static function createChangeDefaultAddress(): ChangeDefaultAddressService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );

        return new ChangeDefaultAddressService(
            new \Forex4you\Domain\Service\ChangeDefaultAddressService($clientCollection)
        );
    }

    /**
     * @return RemoveAllClientsService
     * @throws \Exception
     */
    public static function createRemoveAllClients(): RemoveAllClientsService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );

        $removeClientService = new \Forex4you\Domain\Service\RemoveClientService($clientCollection);

        return new RemoveAllClientsService($clientCollection, $removeClientService);
    }

    /**
     * @return \Forex4you\Application\Service\RemoveClientService
     * @throws \Exception
     */
    public static function createRemoveClient(): RemoveClientService
    {
        $clientCollection = new \Forex4you\Infrastructure\Collection\ClientCollection(
            Config::getConfigs()['db-file']
        );

        $removeClientService = new \Forex4you\Domain\Service\RemoveClientService($clientCollection);

        return new RemoveClientService($removeClientService);

    }
}