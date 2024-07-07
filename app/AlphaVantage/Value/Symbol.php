<?php

namespace App\AlphaVantage\Value;

final class Symbol
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Symbol
    {
        $this->name = $name;

        return $this;
    }
}
