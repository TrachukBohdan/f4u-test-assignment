<?php

require '../../../vendor/autoload.php';

try {
    $removeAllClients = \Forex4you\Infrastructure\Factory\AppServiceFactory::createRemoveAllClients();
    $createClient = \Forex4you\Infrastructure\Factory\AppServiceFactory::createCreateClient();
    $addAddress = \Forex4you\Infrastructure\Factory\AppServiceFactory::createAddAddress();

    $removeAllClients->execute();

    $clientId1 = uniqid('id', true);

    $createClient->execute($clientId1, 'Bob', 'Roofer');

    $addAddress->execute(
        $clientId1,
        new \Forex4you\Application\DTO\AddressDto(
            'Ukraine',
            'Kyiv',
            '2100',
            'Kreschatyk'
        )
    );

    $addAddress->execute(
        $clientId1,
        new \Forex4you\Application\DTO\AddressDto(
            'Ukraine',
            'Vinnytsia',
            '2101',
            'Kosmonavtiv'
        )
    );

    $addAddress->execute(
        $clientId1,
        new \Forex4you\Application\DTO\AddressDto(
            'Ukraine',
            'Vinnytsia',
            '2101',
            'Barske Shose'
        )
    );

    $clientId2 = uniqid('id', true);

    $createClient->execute($clientId2, 'John', 'Smith');

    $addAddress->execute(
        $clientId2,
        new \Forex4you\Application\DTO\AddressDto(
            'Ukraine',
            'Kyiv',
            '2100',
            'Kreschatyk'
        )
    );

    $addAddress->execute(
        $clientId2,
        new \Forex4you\Application\DTO\AddressDto(
            'Ukraine',
            'Vinnytsia',
            '2101',
            'Kosmonavtiv'
        )
    );

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'SUCCESS: loaded' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

} catch (Exception $e) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}