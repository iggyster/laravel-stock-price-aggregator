<?php

namespace App\AlphaVantage;

interface ConfigInterface
{
    public const NAME = 'alpha_vantage';
    public const URL = 'url';
    public const API_KEY = 'apikey';
    public const CONFIG_URL = 'services.'.self::NAME.'.'.self::URL;
    public const CONFIG_API_KEY = 'services.'.self::NAME.'.'.self::API_KEY;
}
