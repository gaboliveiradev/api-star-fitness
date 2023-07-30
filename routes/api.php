<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;

Route::middleware('auth:sanctum')->group(function () {

});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);

    // City

    Route::post('/city', [CityController::class, 'create']);
