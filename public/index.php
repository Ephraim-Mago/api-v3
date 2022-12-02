<?php

use Config\Base\App;
use Routes\Route;

require '../vendor/autoload.php';

/* function dd(mixed $var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
} */

Route::get("/foods", "FoodController@index");
Route::get("/foods/:id", "FoodController@show");

App::run();