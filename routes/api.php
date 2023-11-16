<?php

use App\Http\Controllers\DietController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\WorkoutRoutineController;
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
    Route::get('/measurement/evolution/{id}', [MeasurementController::class, 'getAllByIdEvolution']);
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

    // Payment
    Route::post('/payment', [PaymentController::class, 'create']);

    // Type
    Route::get('/type', [TypeController::class, 'getAll']);
    Route::post('/type', [TypeController::class, 'create']);
    Route::put('/type/{id}', [TypeController::class, 'update']);
    Route::delete('/type/{id}', [TypeController::class, 'delete']);

    // Exercise
    Route::get('/exercise', [ExerciseController::class, 'getAll']);
    Route::post('/exercise', [ExerciseController::class, 'create']);
    Route::delete('/exercise/{id}', [ExerciseController::class, 'delete']);
    Route::put('/exercise/{id}', [ExerciseController::class, 'update']);

    // Diet
    Route::get('/diet', [DietController::class, 'getAll']);
    Route::get('/diet/gym-member/{id}', [DietController::class, 'getAllByIdGymMember']);
    Route::post('/diet', [DietController::class, 'create']);

    // Workout Routine 
    Route::get('/workout-routine', [WorkoutRoutineController::class, 'getAll']);
    Route::get('/workout-routine/gym-member/{id}', [WorkoutRoutineController::class, 'getAllByIdGymMember']);
    Route::post('/workout-routine', [WorkoutRoutineController::class, 'create']);
});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);
Route::post('/login/gym-member', [AuthController::class, 'loginAsGymMember']);