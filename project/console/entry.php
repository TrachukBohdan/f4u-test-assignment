<?php

require dirname(__DIR__).'/vendor/autoload.php';

use Forex4you\Infrastructure\Kernel\ConsoleKernel;

$consoleKernel = new ConsoleKernel();
$consoleKernel->run();