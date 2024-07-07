<?php

namespace App\AlphaVantage\Http\Api;

interface ParametersInterface
{
    public const API_KEY = 'apikey';
    public const FUNCTION = 'function';
    public const SYMBOL = 'symbol';
    public const DATA_TYPE = 'datatype';
    public const JSON_DATA_TYPE = 'json';
    public const GLOBAL_QUOTE_FUNCTION = 'GLOBAL_QUOTE';
}
