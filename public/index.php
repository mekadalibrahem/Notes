<?php 

const BASE_PATH =  __DIR__ . "/../" ;
require   BASE_PATH ."/App/functions.php";
$config =  require base_path("config.php");

spl_autoload_register(function ($class) {
    $class = str_replace('\\' , DIRECTORY_SEPARATOR , $class) ;
    require base_path("$class.php");
});




use App\Route;
$route= new Route();
$routes = require base_path("routes.php");
$request =  parse_url($_SERVER['REQUEST_URI']);

$uri = $request['path'];


$route->route($uri);


