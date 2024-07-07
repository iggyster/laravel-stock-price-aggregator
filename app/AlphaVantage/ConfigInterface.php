<?php

namespace App\AlphaVantage;

interface ConfigInterface
{
    public const NAME = 'alpha_vantage';
    public const URL = 'url';
    public const API_KEY = 'apikey';
    public const CACHE_TTL = 'cache_ttl';
    public const SYMBOLS = 'symbols';
    public const CONFIG_URL = 'services.'.self::NAME.'.'.self::URL;
    public const CONFIG_API_KEY = 'services.'.self::NAME.'.'.self::API_KEY;
    public const CONFIG_SYMBOLS = 'services.'.self::NAME.'.'.self::SYMBOLS;

    public const CONFIG_CACHE_TTL = 'services.'.self::NAME.'.'.self::CACHE_TTL;
}
