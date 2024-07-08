<?php

use App\Jobs\ImportStocks;
use Illuminate\Support\Facades\Schedule;

Schedule::job(ImportStocks::class)->everyMinute();
