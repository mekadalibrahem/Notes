<?php 
$config =  require "./config.php";
require "./functions.php";
require  "./Database.php" ;
require "./Route.php";





$request =  parse_url($_SERVER['REQUEST_URI']);
$uri = $request['path'];


Route::route($uri , Route::$routte_list);


