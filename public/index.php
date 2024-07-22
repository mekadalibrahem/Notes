<?php

use App\Container;
use App\Database;

const BASE_PATH =  __DIR__ . "/../" ;
require   BASE_PATH ."/App/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\' , DIRECTORY_SEPARATOR , $class) ;
    require base_path("$class.php");
});

Container::bind(Database::class, function () {
    $db = new Database(config('database'));
   
    return $db;
});


use App\Route;
$route= new Route();
$routes = require base_path("routes.php");
$request =  parse_url($_SERVER['REQUEST_URI']);
global $route;
$uri = $request['path'];


$route->route($uri);


