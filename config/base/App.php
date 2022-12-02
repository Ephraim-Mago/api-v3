<?php

namespace Config\Base;

use Routes\Route;
use App\Exceptions\NotFoundException;

class App
{
    public static function run()
    {
        try {
            (new Route)->run();
        } catch (NotFoundException $e) {
            return $e->error404();
        }
    }
}