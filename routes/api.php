<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\GymMemberController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AddressController;

Route::middleware('auth:sanctum')->group(function () {
    // City
    Route::post('/city', [CityController::class, 'create']);
    Route::put('/city/{id}', [CityController::class, 'update']);

    // Measurement
    Route::post('/measurement', [MeasurementController::class, 'create']);

    // Evolution
    Route::post('/evolution', [EvolutionController::class, 'create']);

    // Address
    Route::post('/address', [AddressController::class, 'create']);
    Route::put('/address/{id}', [AddressController::class, 'update']);

    // Employee
    Route::post('/employee', [EmployeeController::class, 'create']);

    // Gym Member
    Route::get('/gym-member', [GymMemberController::class, 'getAll']);
    Route::post('/gym-member', [GymMemberController::class, 'create']);
    Route::delete('/gym-member/{id}', [GymMemberController::class, 'delete']);

    // Billing
    Route::post('/billing', [BillingController::class, 'create']);
    Route::get('/billing/{id}', [BillingController::class, 'getAllByIdUser']);

    // Type
    Route::get('/type', [TypeController::class, 'getAll']);
    Route::post('/type', [TypeController::class, 'create']);
    Route::delete('/type/{id}', [TypeController::class, 'delete']);
});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);
Route::post('/login/gym-member', [AuthController::class, 'loginAsGymMember']);