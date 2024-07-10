# Usage

## Seeders

If API is unavailable you may use DB seeder to add data into database and test API endpoints.
To do so, follow this instruction:

1. Run seeders (multiple execution is applicable):

    ```shell
    ./vendor/bin/sail artisan db:seed
    ```

2. Open [latest endpoint](http://localhost/api/stocks/latest) to check the 10 latest records.
3. Open [reports](http://localhost/api/stocks/reports) to check stock report calculated by formula:

    Change = (current_price - previous_price) / previous_price * 100
