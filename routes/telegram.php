<?php

use App\Http\Controllers\Telegram\BotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('telegram.')->group(function () {
    Route::get('/', function () {
        echo 'Telegram API  routes registered ';
    });


    Route::controller(BotController::class)->prefix('bot')->name('bot.')->group(function () {
        Route::get('/connect', 'connect')->name('connect');
        Route::post('/connect', 'connect')->name('connect');
        Route::get('/shop', 'shop')->name('shop');
    });

});



