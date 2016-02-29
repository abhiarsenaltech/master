<?php
namespace App\Http\Utilities;

class Country{

    protected static $countries=[
        "Afghanistan" => "AF",
        "India" =>"In",
        "USA" => "US"
    ];

public static function all(){
    return static::$countries;


}

}