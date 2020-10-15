<?php

namespace Forex4you\Infrastructure\Kernel;

interface ConsoleCommandInterface
{
    /**
     * ConsoleCommandInterface constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description);

    /**
     * @param ParamsBag $params
     */
    public function run(ParamsBag $params): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDescription(): string;
}