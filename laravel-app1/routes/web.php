<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my', function () {
    return view('myview');
});

Route::get('custom/', [MyController::class, 'index']);

Route::get('/customshow', [MyController::class, 'show']);
