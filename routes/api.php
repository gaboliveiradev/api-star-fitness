<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\GymMemberController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\EmployeeController;

Route::middleware('auth:sanctum')->group(function () {
    // Measurement
    Route::post('/measurement', [MeasurementController::class, 'create']);

    // Evolution
    Route::get('/evolution', [EvolutionController::class, 'getAll']);
    Route::post('/evolution', [EvolutionController::class, 'create']);

    // Address
    Route::post('/address', [AddressController::class, 'create']);
    Route::put('/address/{id}', [AddressController::class, 'update']);

    // Employee
    Route::post('/employee', [EmployeeController::class, 'create']);

    // Gym Member
    Route::get('/gym-member', [GymMemberController::class, 'getAll']);
    Route::post('/gym-member', [GymMemberController::class, 'create']);
    Route::put('/gym-member/{id}', [GymMemberController::class, 'update']);
    Route::delete('/gym-member/{id}', [GymMemberController::class, 'delete']);

    // Person
    Route::put('/person/{id}', [PersonController::class, 'update']);

    // Billing
    Route::post('/billing', [BillingController::class, 'create']);
    Route::get('/billing/{id}', [BillingController::class, 'getAllByIdUser']);

    // Type
    Route::get('/type', [TypeController::class, 'getAll']);
    Route::post('/type', [TypeController::class, 'create']);
    Route::put('/type/{id}', [TypeController::class, 'update']);
    Route::delete('/type/{id}', [TypeController::class, 'delete']);
});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);
Route::post('/login/gym-member', [AuthController::class, 'loginAsGymMember']);