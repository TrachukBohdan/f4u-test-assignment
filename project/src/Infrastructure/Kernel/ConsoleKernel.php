<?php

namespace Forex4you\Infrastructure\Kernel;

class ConsoleKernel
{
    private $consoleCommands = [];

    public function bootstrap(array $consoleCommands): void
    {
        foreach ($consoleCommands as $commandConfig) {
            $this->consoleCommands = new $commandConfig['class'](
                $commandConfig['name'],
                $commandConfig['description']
            );
        }
    }

    public function run()
    {
        echo 'running...';
    }
}