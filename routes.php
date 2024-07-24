<?php

use App\Container;
use App\Route;

$route = Container::resolve(Route::class);

$route->get("/","controllers/home.php")->middleware('auth');
$route->get("/about","controllers/about.php");
$route->get("/notes","controllers/notes/index.php");
$route->post('/note/create' , "controllers/notes/store.php");
$route->get("/note/create","controllers/notes/create.php");
$route->get("/note","controllers/notes/show.php");
$route->get("/note/edit" , "controllers/notes/edit.php");
$route->patch("/note/edit", "controllers/notes/update.php");
$route->delete('/note' , 'controllers/notes/delete.php');

$route->get("/register" , "controllers/registration/create.php")->middleware('guest');
$route->post("/register" , "controllers/registration/store.php")->middleware('guest');

