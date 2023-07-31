<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GymMemberController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AddressController;

Route::middleware('auth:sanctum')->group(function () {

});

// Login

Route::post('/login/employee', [AuthController::class, 'loginAsEmployee']);

Route::post('/city', [CityController::class, 'create']);
Route::post('/address', [AddressController::class, 'create']);
Route::post('/employee', [EmployeeController::class, 'create']);
Route::post('/gym-member', [GymMemberController::class, 'create']);

Route::post('/type', [TypeController::class, 'create']);
Route::post('/enrollment', [EnrollmentController::class, 'create']);
