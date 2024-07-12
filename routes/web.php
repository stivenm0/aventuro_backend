<?php

use App\MoonShine\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


