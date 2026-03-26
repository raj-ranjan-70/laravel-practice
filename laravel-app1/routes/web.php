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

Route::get('/param/{id}/{name}', function ($id, $name) {
    return "<h1>My name is $name and Regestration number is $id</h1>";
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

// Passing multiple parameters

// Example Sum of two numbers
Route::get('/sum/{num1}/{num2}', function ($num1, $num2) {
    $sum = $num1 + $num2;
    return "<h1> The Sum is $sum </h1>";
})->whereNumber('num1')->whereNumber('num2');

// Example Multiplication Table
Route::get('/table/{num}', function ($num) {
    for($i=1;$i<11;$i++) {
        $result = $num * $i;
        echo $num . " x " . $i . " = " . $result . "</br>";
    }
})->whereNumber('num1');

/*
    Passing data to the views

    1ST METHOD :: Arrays -> Associative Arrays as a ['key': 'value'] pair
    2ND METHOD :: with('var_name', 'value') -> as a var_name, and it's value pair
    3RD METHOD :: compact($var1, $var2, $var3) -> multiple parameter
    4TH METHOD :: withName() -> like withAddress($address) and use camel case to define this methods name.
*/

// Using Associative array
Route::get('/newview1', function () {
    return view('newview', ['name'=>'Raj']);
});

// Using with()
Route::get('/newview2', function () {
    return view('newview')->with('name', "Raj Ranjan");
});

// Using Compact with static data
Route::get('/newview3', function () {
    $name = "Raj Ranjan";
    return view('newview', compact('name'));
});

// Using Compact with dynamic data
Route::get('/newview4/{name}', function ($name) {
    return view('newview', compact('name'));
});

// Using withName()
Route::get('/newview5', function () {
    $name = "Raj";
    $add = "B.H.01";
    return view('/newview')->withName($name)->withAdd($add);
});


// Named Route

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/aboutus', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
});


// Blade practice
Route::get('/bladepractice/{word}', function ($word) {
    return view('bladepractice', compact('word'));
});

// Practice
Route::get('studentdetails/', function () {
    $details = ["student1"=> ["id"=>"101", "name"=>"Raj"], "student2"=> ["id"=>"102", "name"=>"Mayank"], "student3"=>
        ["id"=>"103", "name"=>"Raushan"]];
    return view('practice', compact('details'));
});

Route::get('studentdetails/{id}', function ($id) {

    $details = ["student1"=> ["id"=>"101", "name"=>"Raj"],
                "student2"=> ["id"=>"102", "name"=>"Mayank"],
                "student3"=> ["id"=>"103", "name"=>"Raushan"]];

    return view('practice', compact('details', 'id'));
});
