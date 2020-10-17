<?php

require '../../../vendor/autoload.php';

try {

    $options = getopt('', ['firstName:', 'lastName:']);
    $createClient = \Forex4you\Infrastructure\Factory\AppServiceFactory::createCreateClient();
    $createClient->execute(
        uniqid('id', true),
        key_exists('firstName', $options) ? $options['firstName'] : '',
        key_exists('lastName', $options) ? $options['lastName'] : ''
    );

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'SUCCESS: Client was added successfully' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

} catch (\Throwable $exception) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ERROR: ". $exception->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}