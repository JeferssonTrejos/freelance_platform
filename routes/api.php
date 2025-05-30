<?php

use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientApiController::class);

Route::apiResource('freelancers', FreelancerController::class);

Route::apiResource('projects', ProjectController::class);

Route::apiResource('skills', SkillController::class);

Route::apiResource('reviews', ReviewController::class);
Route::apiResource('projects', ProjectController::class);


