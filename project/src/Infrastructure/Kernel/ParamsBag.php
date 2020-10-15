<?php

namespace Forex4you\Infrastructure\Kernel;

class ParamsBag
{
    private $params = [];

    /**
     * @param string $name
     * @param string $value
     */
    public function addParam(string $name, string $value): void
    {
        $this->params[$name] = $value;
    }

    /**
     * @param string $name
     * @return string
     */
    public function getParam(string $name): string
    {
        return $this->params[$name];
    }
}