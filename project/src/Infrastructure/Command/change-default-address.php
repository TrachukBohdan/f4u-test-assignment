<?php

require '../../../vendor/autoload.php';

try {
    $options = getopt('', [
        'id:',
        'country:',
        'city:',
        'zipcode:',
        'street:',
    ]);

    $changeAddress = \Forex4you\Infrastructure\Factory\AppServiceFactory::createChangeDefaultAddress();
    $changeAddress->execute(
        key_exists('id', $options) ? $options['id'] : '',
        new \Forex4you\Application\DTO\AddressDto(
            key_exists('country', $options) ? $options['country'] : '',
            key_exists('city', $options) ? $options['city'] : '',
            key_exists('zipcode', $options) ? $options['zipcode'] : '',
            key_exists('street', $options) ? $options['street'] : ''
        )
    );

    echo '-----------------------------------------------------------' . PHP_EOL;
    echo 'SUCCESS: Address was changed successfully' . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;

} catch (\Throwable $exception) {
    echo '-----------------------------------------------------------' . PHP_EOL;
    echo "ERROR: ". $exception->getMessage() . PHP_EOL;
    echo '-----------------------------------------------------------' . PHP_EOL;
}