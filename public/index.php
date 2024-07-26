<?php

use App\Container;
use App\Database;
use App\Route;
use App\Session;

const BASE_PATH =  __DIR__ . "/../" ;
require   BASE_PATH ."/App/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\' , DIRECTORY_SEPARATOR , $class) ;
    require base_path("$class.php");
});

Container::bind(Database::class, function () {
    return  new Database(config('database'));
});

Container::bind(Route::class, function () {
    return new Route();
});

$routes = require base_path("routes.php");
$request =  parse_url($_SERVER['REQUEST_URI']);

$uri = $request['path'];


$route->route($uri);

Session::unflsh();
