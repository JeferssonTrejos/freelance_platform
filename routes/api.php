<?php

use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProposalController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientApiController::class);

Route::apiResource('freelancers', FreelancerController::class);

Route::apiResource('services', ServiceController::class);

Route::apiResource('projects', ProjectController::class);

Route::apiResource('reviews', ReviewController::class);

Route::apiResource('milestones', MilestoneController::class);

Route::apiResource('payments', PaymentController::class);
Route::post('payments/{payment}/release', [PaymentController::class, 'release']);
Route::post('payments/{payment}/dispute', [PaymentController::class, 'dispute']);

Route::apiResource('proposals', ProposalController::class);

