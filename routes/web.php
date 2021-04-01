<?php

use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, 'index']);
Route::post('/store', [Controller::class, 'store']);
