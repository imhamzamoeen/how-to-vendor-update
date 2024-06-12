<?php
namespace App\Classes;

use Carbon\Carbon;
use Carbon\CarbonTimeZone;

class myCarbon extends Carbon
{

    public function myCustomMethod()
    {
        return ("this is my custom method");
    }

    public function dayOfYear(?int $value = null): static|int
    {
        dump("this is what i have overriden a vendor method");
        return 190;
    }

}
