<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {

});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);
