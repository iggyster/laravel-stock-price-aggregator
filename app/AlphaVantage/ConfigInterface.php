<?php

namespace App\AlphaVantage;

interface ConfigInterface
{
    public const string NAME = 'alpha_vantage';
    public const string URL = 'url';
    public const string API_KEY = 'apikey';
    public const string CACHE_TTL = 'cache_ttl';
    public const string SYMBOLS = 'symbols';
    public const string CONFIG_URL = 'services.'.self::NAME.'.'.self::URL;
    public const string CONFIG_API_KEY = 'services.'.self::NAME.'.'.self::API_KEY;
    public const string CONFIG_SYMBOLS = 'services.'.self::NAME.'.'.self::SYMBOLS;
    public const string CONFIG_CACHE_TTL = 'services.'.self::NAME.'.'.self::CACHE_TTL;
}
