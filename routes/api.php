<?php

use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\FreelancerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientApiController::class);

Route::apiResource('freelancers', FreelancerController::class);