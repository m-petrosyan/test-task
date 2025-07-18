<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('db', DatabaseController::class)->name('db');
    Route::resource('db/user', UserController::class)->only('index', 'show');
    Route::resource('db/activity', ActivityController::class)->only('index', 'show');
    Route::resource('db/activityType', ActivityTypeController::class)->only('index', 'show');
    Route::resource('db/participant', ParticipantController::class)->only('index', 'show');
});

require __DIR__.'/auth.php';
