<?php

namespace Routes;

use App\Exceptions\NotFoundException;

class Route
{
    private $url;
    private static $routes = [];

    public function __construct()
    {
        $this->url = trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function get(string $path, string $action)
    {
        self::$routes['GET'][] = new Router($path, $action);
    }

    public function run()
    {
        foreach (self::$routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        throw new NotFoundException("La page demandée est introuvable");
    }
}