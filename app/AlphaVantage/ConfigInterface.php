<?php

namespace App\AlphaVantage;

interface ConfigInterface
{
    public const string NAME = 'alpha_vantage';
    public const string URL = 'url';
    public const string API_KEY = 'apikey';
    public const string CACHE_TTL = 'cache_ttl';
    public const string SYMBOLS = 'symbols';
    public const string RATE_LIMITER = 'rate_limiter';
    public const string RATE_LIMITER_KEY = 'rate_limiter_key';
    public const string RATE_LIMITER_ATTEMPTS = 'rate_limiter_attempts';
    public const string RATE_LIMITER_DECAY_RATE = 'rate_limiter_decay_rate';
    public const string CONFIG_ALIAS = 'services.'.self::NAME;
    public const string CONFIG_URL = self::CONFIG_ALIAS.'.'.self::URL;
    public const string CONFIG_API_KEY = self::CONFIG_ALIAS.'.'.self::API_KEY;
    public const string CONFIG_SYMBOLS = self::CONFIG_ALIAS.'.'.self::SYMBOLS;
    public const string CONFIG_CACHE_TTL = self::CONFIG_ALIAS.'.'.self::CACHE_TTL;
    public const string CONFIG_RATE_LIMITER = self::CONFIG_ALIAS.'.'.self::RATE_LIMITER;
    public const string CONFIG_RATE_LIMITER_KEY = self::CONFIG_RATE_LIMITER.'.'.self::RATE_LIMITER_KEY;
    public const string CONFIG_RATE_LIMITER_ATTEMPTS = self::CONFIG_RATE_LIMITER.'.'.self::RATE_LIMITER_ATTEMPTS;
    public const string CONFIG_RATE_LIMITER_DECAY_RATE = self::CONFIG_RATE_LIMITER.'.'.self::RATE_LIMITER_DECAY_RATE;
}
