<?php

require '../../../vendor/autoload.php';

try {

    $getClient = \Forex4you\Infrastructure\Factory\AppServiceFactory::createGetClient();

    $options = getopt('', ['id:']);

    $client = $getClient->execute(
        key_exists('id', $options) ? $options['id'] : ''
    );

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'Client info:' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ID: \t\t" . $client->getClientId() . PHP_EOL;
    echo "First Name: \t" . $client->getFirstName() . PHP_EOL;
    echo "Last Name: \t" . $client->getLastName() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

    if (null === $client->getDefaultShippingAddress()) {
        echo 'Addresses: No addresses added' . PHP_EOL;
    } else {
        echo "Default address: \t"
            . $client->getDefaultShippingAddress()->getCountry() . ' '
            . $client->getDefaultShippingAddress()->getCity() . ' '
            . $client->getDefaultShippingAddress()->getZipcode() . ' '
            . $client->getDefaultShippingAddress()->getStreet() . PHP_EOL;

        foreach ($client->getShippingAddresses() as $position => $shippingAddress) {
            echo "[$position] address: \t"
                . $shippingAddress->getCountry() . ' '
                . $shippingAddress->getCity() . ' '
                . $shippingAddress->getZipcode() . ' '
                . $shippingAddress->getStreet() . PHP_EOL;
        }
    }

} catch (\Throwable $exception) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ERROR: ". $exception->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}
