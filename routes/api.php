<?php

use App\Http\Controllers\AccessGroupController;
use App\Http\Controllers\AccessGroupEmployeeAssocController;
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
    // Access Group
    Route::get('/access-group', [AccessGroupController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,AccessGroup:select']);
    Route::post('/access-group/employee', [AccessGroupEmployeeAssocController::class, 'createAccessGroupEmployeeAssoc'])->middleware(['auth:sanctum', 'ability:App:*,AccessGroup:insert']);
    Route::post('/access-group/employee/update', [AccessGroupEmployeeAssocController::class, 'update'])->middleware(['auth:sanctum', 'ability:App:*']);

    // Measurement
    Route::get('/measurement/evolution/{id}', [MeasurementController::class, 'getAllByIdEvolution'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);
    Route::post('/measurement', [MeasurementController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);

    // Evolution
    Route::get('/evolution', [EvolutionController::class, 'getAll']);
    Route::post('/evolution', [EvolutionController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);

    // Address
    Route::post('/address', [AddressController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Address:insert']);
    Route::put('/address/{id}', [AddressController::class, 'update'])->middleware(['auth:sanctum', 'ability:App:*,Address:update']);

    // Employee
    Route::get('/employee', [EmployeeController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,Employee:select']);
    Route::post('/employee', [EmployeeController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Employee:insert']);
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->middleware(['auth:sanctum', 'ability:App:*,Employee:update']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'delete'])->middleware(['auth:sanctum', 'ability:App:*,Employee:delete']);

    // Gym Member
    Route::get('/gym-member', [GymMemberController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,GymMember:select']);
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
    Route::get('/type', [TypeController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,Plan:select']);
    Route::post('/type', [TypeController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Plan:insert']);
    Route::get('/type/{id}', [TypeController::class, 'getById'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);
    Route::put('/type/{id}', [TypeController::class, 'update'])->middleware(['auth:sanctum', 'ability:App:*,Plan:update']);
    Route::delete('/type/{id}', [TypeController::class, 'delete'])->middleware(['auth:sanctum', 'ability:App:*,Plan:delete']);

    // Exercise
    Route::get('/exercise', [ExerciseController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,Exercise:select']);
    Route::get('/exercise/{id}', [ExerciseController::class, 'getById'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);
    Route::post('/exercise', [ExerciseController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Exercise:insert']);
    Route::delete('/exercise/{id}', [ExerciseController::class, 'delete'])->middleware(['auth:sanctum', 'ability:App:*,Exercise:delete']);
    Route::put('/exercise/{id}', [ExerciseController::class, 'update'])->middleware(['auth:sanctum', 'ability:App:*,Exercise:update']);

    // Diet
    Route::get('/diet', [DietController::class, 'getAll']);
    Route::get('/diet/gym-member/{id}', [DietController::class, 'getAllByIdGymMember'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);
    Route::post('/diet', [DietController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*']);

    // Workout Routine 
    Route::get('/workout-routine', [WorkoutRoutineController::class, 'getAll'])->middleware(['auth:sanctum', 'ability:App:*,WorkoutRoutine:select']);
    Route::get('/workout-routine/gym-member/{id}', [WorkoutRoutineController::class, 'getAllByIdGymMember'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,WorkoutRoutine:select']);
    Route::post('/workout-routine', [WorkoutRoutineController::class, 'create'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,WorkoutRoutine:insert']);
    Route::get('/workout-routine/mobile/{weekday}/{id}', [WorkoutRoutineController::class, 'getAllWorkoutRoutineByIdAndWeekDay'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,WorkoutRoutine:insert']);
    Route::post('/workout-routine/mobile', [WorkoutRoutineController::class, 'createInMobile'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,WorkoutRoutine:insert']);
    Route::post('/workout-routine/exercise/assoc', [WorkoutRoutineController::class, 'createWorkoutRoutineExerciseAssoc'])->middleware(['auth:sanctum', 'ability:App:*,Mobile:*,WorkoutRoutine:insert']);
});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);
Route::post('/login/gym-member', [AuthController::class, 'loginAsGymMember']);