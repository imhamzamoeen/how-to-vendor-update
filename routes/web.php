<?php

use App\Classes\CarbonFascade;
use App\Classes\myCarbon;
use Carbon\Carbon;
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

    dump($myExtendedCarbon->dayOfYear());

    dump($myExtendedCarbon->myCustomMethod());
    // the issue is now i am supposed to create my custom class object

    dd("how's that ");

});



Route::get('/bind-way', function (Request $request) {
    // this is similar way if we create an instance form the app contaier then it works fine
    $myExtendedCarbon = app(Carbon::class);

    dump($myExtendedCarbon->dayOfYear());

    dump($myExtendedCarbon->myCustomMethod());

    // but if i create  a normal instance of the carob it won't work
    dump("normal creation of carbon instance");

    $myExtendedCarbon = (new Carbon());

    dump($myExtendedCarbon->dayOfYear());

    dump($myExtendedCarbon->myCustomMethod());  // i will get an error over it that it is not defined

    dd("how's that ");

});




Route::get('/fascade-way', function (Request $request) {
    // same as bind
    dump(CarbonFascade::dayOfYear());
    dump(CarbonFascade::myCustomMethod());

});

Route::get('/psr-4', function (Request $request) {
    // we tell composer to load my class instead of vendor folder class
    /*

     "autoload": {
        "psr-4": {

            "Carbon\\Carbon\\": "app/Classes"  // when you find namespace of carbon/carbon get class fron app/classes;
        }
    },
    here there will be a carbon.php file with same namespace as carbon/carbon
    */
    $myExtendedCarbon = (new Carbon());

    dump($myExtendedCarbon->dayOfYear());

    dump($myExtendedCarbon->myCustomMethod());

});


Route::get('/classmap', function (Request $request) {
    // we tell composer to load my class instead of vendor folder class bese
    //best method if you want vendor to even use this classs
    /*

    "autoload": {
        "classmap": [
            "app/Classes/Carbon.php"
        ]
    },
    },
     what it does is reads that file while autoloading , check the namespace and class name
     in this case it would be Carbon/Carbon in my file app/Classes/Carbon
     so it would map that to that namespace in class map file
  'Carbon\\Carbon' => $baseDir . '/app/Extensions/Carbon.php',

  so in this application every time carbon class is called it will give my class
    */
    $myExtendedCarbon = (new Carbon());

    dump($myExtendedCarbon->dayOfYear());

    dump($myExtendedCarbon->myCustomMethod());

});


