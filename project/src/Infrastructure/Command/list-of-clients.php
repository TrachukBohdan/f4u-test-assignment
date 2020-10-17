<?php

require '../../../vendor/autoload.php';

try {

    $getAllClients = \Forex4you\Infrastructure\Factory\AppServiceFactory::createGetAllClients();
    $clients = $getAllClients->execute();

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'Clients list:' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

    foreach ($clients as $client) {
        echo "ID: \t\t" . $client->getClientId() . PHP_EOL;
        echo "First Name: \t" . $client->getFirstName() . PHP_EOL;
        echo "Last Name: \t" . $client->getLastName() . PHP_EOL;
        echo '-----------------------------------------------------------' . PHP_EOL;
    }

} catch (\Throwable $exception) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ERROR: ". $exception->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}
