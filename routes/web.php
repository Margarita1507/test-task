<?php

use App\Http\Controllers\PageAController;
use App\Services\Link\LinkCheckService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'IndexController') -> name('index');
    Route::get('/{uniqueLink}', 'PageAController') -> name('pageA');
    Route::group(['namespace' => 'User'], function () {
        Route::post('/', 'UserCreateController')->name('user.create');
    });
    Route::group(['namespace' => 'Link', 'prefix' => 'links'], function () {
        Route::post('/{link}', 'LinkUpdateController')->name('link.update');
        Route::delete('/{link}', 'LinkDeleteController')->name('link.delete');
    });
    Route::group(['namespace' => 'Win', 'prefix' => 'wins'], function () {
        Route::get('/{link}/lucky/{win}', 'WinLuckyController')->name('win.lucky');
        Route::get('/{link}/history/{win}', 'WinHistoryController')->name('win.history');
    });
});

