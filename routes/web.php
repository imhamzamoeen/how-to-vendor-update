<?php

use App\Classes\myCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    return view('welcome');
});

Route::get('/extenstion-way', function (Request $request) {
    // i have targetted the carbon class of laravel  just try to add a new method in it and will check that
    // now in this method we extend that class and use that class in our project

    $myExtendedCarbon = new myCarbon();
    // now i have extended that class with actual Carbon class so i have to create the objects of that class and use it in my code

    dump($myExtendedCarbon->now());

    dump($myExtendedCarbon->myCustomMethod());

    dd("how's that ");


});

