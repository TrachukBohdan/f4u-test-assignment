<?php

namespace Test;

use Forex4you\Application\DTO\AddressDto;
use Forex4you\Application\Service\AddAddressService;
use Forex4you\Application\Service\CreateClientService;
use Forex4you\Application\Service\GetClientService;
use Forex4you\Application\Service\RemoveAllClientsService;
use Forex4you\Domain\Exception\AddShippingAddressException;
use Forex4you\Domain\Exception\InvalidFieldValueException;
use Forex4you\Domain\Service\RemoveClientService;
use Forex4you\Infrastructure\Collection\ClientCollection;
use Forex4you\Infrastructure\Config;
use PHPUnit\Framework\TestCase;

/**
 * Class AddAddressTest
 * @package Test
 */
class AddAddressTest extends TestCase
{
    public const CLIENT_ID = '111ASDF111';

    /**
     * @var AddAddressService
     */
    private $addAddress;

    /**
     * @var GetClientService
     */
    private $getClient;

    /**
     * @throws \Exception
     */
    public function setUp(): void
    {
        $configs = Config::getConfigs();
        $clientCollection = new ClientCollection($configs['db-file-test']);
        $removeClient = new RemoveClientService($clientCollection);
        $removeAll = new RemoveAllClientsService($clientCollection, $removeClient);
        $removeAll->execute();

        $createClient = new CreateClientService(
            new \Forex4you\Domain\Service\CreateClientService($clientCollection)
        );

        $createClient->execute(self::CLIENT_ID, 'FirstName', 'LastName');

        $this->addAddress = new AddAddressService(
            new \Forex4you\Domain\Service\AddAddressService($clientCollection)
        );

        $this->getClient = new GetClientService($clientCollection);
    }

    /**
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function testAddEmptyAddress(): void
    {
        $this->expectException(InvalidFieldValueException::class);

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('', '', '', '')
        );
    }

    /**
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function testAddMoreThan3Addresses(): void
    {
        $this->expectException(AddShippingAddressException::class);

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country1', 'city1', '1111', 'street1')
        );

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country2', 'city2', '2222', 'street2')
        );

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country3', 'city3', '3333', 'street3')
        );

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country4', 'city4', '4444', 'street4')
        );
    }

    /**
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function testAddDefaultAddress(): void
    {
        $client = $this->getClient->execute(self::CLIENT_ID);

        $this->assertTrue($client->getDefaultShippingAddress() == null);

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country1', 'city1', '1111', 'street1')
        );

        $client = $this->getClient->execute(self::CLIENT_ID);

        $this->assertTrue($client->getDefaultShippingAddress() !== null);
        $this->assertTrue(count($client->getShippingAddresses()) == 0);
    }

    /**
     * @throws \Forex4you\Domain\Exception\ClientNotFoundException
     */
    public function testAddTwoAddresses(): void
    {
        $client = $this->getClient->execute(self::CLIENT_ID);

        $this->assertTrue($client->getDefaultShippingAddress() == null);
        $this->assertTrue(count($client->getShippingAddresses()) == 0);

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country1', 'city1', '1111', 'street1')
        );

        $this->addAddress->execute(
            self::CLIENT_ID,
            new AddressDto('country2', 'city2', '2222', 'street2')
        );

        $client = $this->getClient->execute(self::CLIENT_ID);

        $this->assertTrue($client->getDefaultShippingAddress() !== null);
        $this->assertTrue(count($client->getShippingAddresses()) == 1);
    }
}