<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\V1\BookingController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\PackageController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')->group(function(){
    Route::apiResource('/categories', CategoryController::class)->only('index');


Route::apiResource('/bookings', BookingController::class)->only('index', 'store')
                  ->middleware('auth:api');

Route::apiResource('/packages', PackageController::class)->only('index', 'show');


Route::get('/users', [UserController::class, 'show'])
                   ->middleware('auth:api');


Route::match(['put', 'patch'],'/users', [UserController::class, 'update'])
            ->middleware('auth:api');
});



require __DIR__.'/auth.php';

                




