<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AmoCrmFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AmoCrm';
    }
}
