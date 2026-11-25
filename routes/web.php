<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'StudioController@overview')->name('overview');
Route::get('/orders', 'StudioController@orders')->name('orders');
Route::get('/pickups', 'StudioController@pickups')->name('pickups');
