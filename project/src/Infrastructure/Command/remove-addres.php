<?php

require '../../../vendor/autoload.php';

try {

    $removeAddress = \Forex4you\Infrastructure\Factory\AppServiceFactory::createRemoveAddress();

    $options = getopt('', ['id:', 'position:']);

    $removeAddress->execute(
        key_exists('id', $options) ? $options['id'] : '',
        key_exists('position', $options) ? (int)$options['position'] : ''
    );

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'SUCCESS: Address was removed successfully' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

} catch (\Throwable $exception) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ERROR: ". $exception->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}