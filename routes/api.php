<?php

use App\Http\Controllers\GetLatestStockController;
use App\Http\Controllers\GetReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/stocks/latest', GetLatestStockController::class);
Route::get('/stocks/reports', GetReportsController::class);
