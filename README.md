# Laravel Stock Price Aggregator

This is a Laravel showcase project. The app aggregates real-time stock price data from
the [Alpha Vantage API](https://www.alphavantage.co/) and provides comprehensive reporting functionalities for analyzing
stock trends.

## Table of contents

* [Installation](#installation)
* [Quick start](#quick-start)
* [Documentation](#documentation)

## Installation

!WARNING: Installation was tested only on macOS and based on the information from the official doc.

The application is using [Laravel Sail](https://laravel.com/docs/11.x/sail) for containerisation, so I assume you have Docker installed.

1. Clone the project

    ```shell
    git clone git@github.com:iggyster/laravel-stock-price-aggregator.git
    ```

2. Install composer packages:

    ```shell
    docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v "$(pwd):/var/www/html" \
      -w /var/www/html \
      laravelsail/php83-composer:latest \
      composer install --ignore-platform-reqs
    ```
3. Copy `.env.example` into `.env`

   ```shell
   cp .env.example .env
   ```

4. [Register an Alpha Vantage API Key](https://www.alphavantage.co/support/#api-key) and set in your `.env` file:

   ```text
   ALPHA_VANTAGE_API_KEY=
   ```

5. Run sail (this step may take few minutes).

    ```shell
    ./vendor/bin/sail up -d
    ```

6. Run migrations.

   ```shell
   ./vendor/bin/sail artisan migrate
   ```

## Quick start

To test implementation follow this steps:

1. Add ImportStocks job to the queue

   ```shell
   ./vendor/bin/sail artisan schedule:test
   ```
2. Run the queue worker

   ```shell
   ./vendor/bin/sail artisan queue:work --once
   ```
3. Go to [the latest endpoint](http://lcoalhost/api/stocks/latest) to see latest stocks.
   
## Documentation

- [Usage](./docs/usage.md)
- [Design decisions](./docs/design.md)
- [Development notes](./docs/dev-notes.md)
