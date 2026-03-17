<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function index()
    {
        return "This is my index controller";
    }

    public function show() {
        return "This is custom show controller";
    }
}
