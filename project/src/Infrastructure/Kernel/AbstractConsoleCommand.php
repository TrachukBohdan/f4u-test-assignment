<?php

namespace Forex4you\Infrastructure\Kernel;

/**
 * Class AbstractConsoleCommand
 * @package Forex4you\Infrastructure\Kernel
 */
abstract class AbstractConsoleCommand implements ConsoleCommandInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * ConsoleCommandInterface constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}