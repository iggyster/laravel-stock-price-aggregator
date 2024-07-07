<?php

declare(strict_types=1);

namespace App\AlphaVantage\Http\Api;

use App\AlphaVantage\Http\HttpClientInterface;

readonly class CoreStockClient implements CoreStockClientInterface
{
    private const BASE_URI = '/query';

    public function __construct(
        protected HttpClientInterface $httpClient,
    ) {
    }

    public function fetchGlobalQuote(string $symbol, ?array $options = null): array
    {
        return $this->httpClient->get(self::BASE_URI, [
            ParametersInterface::FUNCTION => ParametersInterface::GLOBAL_QUOTE_FUNCTION,
            ParametersInterface::SYMBOL => $symbol,
            ParametersInterface::DATA_TYPE => ParametersInterface::JSON_DATA_TYPE,
        ]);
    }
}
