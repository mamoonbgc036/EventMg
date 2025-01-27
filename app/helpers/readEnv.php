<?php
namespace App\Helpers;

function readEnv($key)
{
    $file = ROOT . '/.env';
    //LOAD .env file
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    //construct an multidimensional array with key value pairs
    //chech for $key 
    //if found return the value
    //otherwise return null;




    foreach ($lines as $value) {
        $split = explode('=', $value);
        $check[$split[0]] = $split[1];
    }

    return $check[$key];

}