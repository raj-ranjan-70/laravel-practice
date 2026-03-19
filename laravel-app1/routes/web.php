<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
//    echo "Hello World!!!", "<br>";
//    echo "Hello Everyone!!!";
});

Route::get('/my', function () {
    return view('myview');
});

Route::get('custom/', [MyController::class, 'index']);

Route::get('/customshow', [MyController::class, 'show']);



// Routing Parameters :: Laravel Route Parameters

Route::get('/param/{id}', function ($id) {
    return "<h1> User id is $id";
});

Route::get('/param/{id1}/{id2}', function ($id1, $id2) {
    return "<h1> User id is $id1 and $id2</h1>";
});

// Optional Parameter
Route::get('/param/{id?}', function ($id = 123) {
    return "<h1> User id is $id </h1>";
});

// Routing Constraint :: Accept only a certain type of routing parameter and reject other types with 404 Error
Route::get('/paramnum/{id}', function ($id) {
    return "<h1> User id is $id";
})->whereNumber('id');

Route::get('/paramalpha/{id}', function ($id) {
    return "<h1> User id is $id";
})->whereAlpha('id');

Route::get('/paramalphanum/{id}', function ($id) {
    return "<h1> User id is $id";
})->whereAlphaNumeric('id');

Route::get('/paramregex/{id}', function ($id) {
    return "<h1> User id is $id";
})->where('id', '[0-9]+');

