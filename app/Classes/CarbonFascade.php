<?php

namespace App\Classes;

use Illuminate\Support\Facades\Facade;

class CarbonFascade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return myCarbon::class;
    }
}
