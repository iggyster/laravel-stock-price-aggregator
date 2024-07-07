<?php

declare(strict_types=1);

namespace App\Http\Client\Adapter;

use App\AlphaVantage\Http\HttpClientInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class AlphaVantageAdapter implements HttpClientInterface
{
    public function get(string $uri, array $params = []): array
    {
        /** @var PendingRequest $httpMacros */
        $httpMacros = Http::{self::MACRO_NAME}();

        try {
            $response = $httpMacros->withQueryParameters($params)->get($uri);
            if ($response->failed()) {
                return [];
            }

            return $response->json();
        } catch (\Throwable) {
        }

        return [];
    }
}
