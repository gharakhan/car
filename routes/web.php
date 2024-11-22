<?php

use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Home\MarketController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\Home\PlaceController;
use App\Http\Controllers\Home\SpiderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/test', [PageController::class, 'test'])->name('test');


Route::resource('transports', TransportController::class);
//Route::resource('markets', MarketController::class);

Route::get('token', [SpiderController::class, 'token'])->name('token');


