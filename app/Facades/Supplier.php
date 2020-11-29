<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Supplier extends Facade{
    // protected static function getFacadeAccessor() { 
    //     return 'cart'; 
    // }
    public static function getFacadeAccessor()
    {
        return 'supplier';
    }
}