<?php

use App\Container;
use App\Route;

$route = Container::resolve(Route::class);

$route->get("/","controllers/home.php");
$route->get("/about","controllers/about.php")->middleware('auth');
$route->get("/notes","controllers/notes/index.php")->middleware('auth');
$route->post('/note/create' , "controllers/notes/store.php")->middleware('auth');
$route->get("/note/create","controllers/notes/create.php")->middleware('auth');
$route->get("/note","controllers/notes/show.php")->middleware('auth');
$route->get("/note/edit" , "controllers/notes/edit.php")->middleware('auth');
$route->patch("/note/edit", "controllers/notes/update.php")->middleware('auth');
$route->delete('/note' , 'controllers/notes/delete.php')->middleware('auth');

$route->get("/register" , "controllers/registration/create.php")->middleware('guest');
$route->post("/register" , "controllers/registration/store.php")->middleware('guest');

$route->get("/login" , "controllers/auth/create.php")->middleware("guest");
$route->post("/login" , "controllers/auth/store.php")->middleware("guest");

$route->get("/logout" , "controllers/auth/destroy.php")->middleware("auth");


