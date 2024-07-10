<?php

use App\Http\Controllers\V1\BookingController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\PackageController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('/categories', CategoryController::class)->only('index');

Route::apiResource('/packages', PackageController::class)->only('index', 'show');

Route::apiResource('/bookings', BookingController::class)->only('index', 'store')
                  ->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'show'])
                   ->middleware('auth:sanctum');


Route::match(['put', 'patch'],'/users', [UserController::class, 'update'])
            ->middleware('auth:sanctum');

                




