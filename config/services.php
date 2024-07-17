<?php

use App\AlphaVantage\ConfigInterface as AlphaVantage;

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    AlphaVantage::NAME => [
        AlphaVantage::URL => 'https://www.alphavantage.co/',
        AlphaVantage::API_KEY => env('ALPHA_VANTAGE_API_KEY'),
        AlphaVantage::SYMBOLS => ['VTI', 'VWO', 'VGLT', 'VEA', 'AGG', 'IBTG', 'AAPL', 'NFLX', 'GOOGL', 'EPAM'],
        AlphaVantage::CACHE_TTL => 1,
        AlphaVantage::RATE_LIMITER => [
            AlphaVantage::RATE_LIMITER_KEY => 'alpha_vantage:api_rate_limiter',
            AlphaVantage::RATE_LIMITER_ATTEMPTS => 25,
            AlphaVantage::RATE_LIMITER_DECAY_RATE => 86400,
        ]
    ],

];
