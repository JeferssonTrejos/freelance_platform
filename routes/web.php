<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MongoPingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mongo-ping', [MongoPingController::class, 'ping']);
