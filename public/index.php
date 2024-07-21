<?php 
$config =  require "./config.php";
require "./functions.php";
require "./Route.php";
require  "./Database.php" ;
require "./Response.php";
$route_list = require "./routes.php";
$db = new Database($config['database']);
// Make $config and $db global
global $config, $db;
$request =  parse_url($_SERVER['REQUEST_URI']);
$uri = $request['path'];


Route::route($uri , $route_list);


