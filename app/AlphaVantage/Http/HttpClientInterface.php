<?php

namespace App\AlphaVantage\Http;

interface HttpClientInterface
{
    public const MACRO_NAME = 'alphaVantage';

    /**
     * @param array<string, mixed> $params
     */
    public function get(string $uri, array $params = []): array;
}
