<?php

use App\Container;
use App\Route;

$route = Container::resolve(Route::class);

$route->get("/","controllers/home.php");
$route->get("/about","controllers/about.php");
$route->get("/notes","controllers/notes/index.php");
$route->post('/note/create' , "controllers/notes/store.php");
$route->get("/note/create","controllers/notes/create.php");
$route->get("/note","controllers/notes/show.php");
$route->delete('/note' , 'controllers/notes/delete.php');

