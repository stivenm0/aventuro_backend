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



Route::apiResource('/category', CategoryController::class)->only('index');

Route::apiResource('/package', PackageController::class)->only('index', 'show');

Route::apiResource('/booking', BookingController::class)->only('index', 'store')
                  ->middleware('auth:sanctum');

Route::apiResource('/user', UserController::class)->only('index')
                   ->middleware('auth:sanctum');


Route::match(['put', 'patch'],'/user', [UserController::class, 'update'])
            ->middleware('auth:sanctum');

                




