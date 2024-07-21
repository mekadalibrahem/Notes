<?php 

const BASE_PATH =  __DIR__ . "/../" ;
require   BASE_PATH ."/App/functions.php";
$config =  require base_path("config.php");

spl_autoload_register(function ($class) {
    require base_path("App/$class.php");
});

$route_list = require base_path("routes.php");
// $db = new Database($config['database']);
// dd($db);
// Make $config and $db global
global $config, $db;
$request =  parse_url($_SERVER['REQUEST_URI']);
$uri = $request['path'];


Route::route($uri , $route_list);


