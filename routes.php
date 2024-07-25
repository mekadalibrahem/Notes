<?php

use App\Container;
use App\Route;

$route = Container::resolve(Route::class);

$route->get("/","home.php");
$route->get("/about","about.php")->middleware('auth');
$route->get("/notes","notes/index.php")->middleware('auth');
$route->post('/note/create' , "notes/store.php")->middleware('auth');
$route->get("/note/create","notes/create.php")->middleware('auth');
$route->get("/note","notes/show.php")->middleware('auth');
$route->get("/note/edit" , "notes/edit.php")->middleware('auth');
$route->patch("/note/edit", "notes/update.php")->middleware('auth');
$route->delete('/note' , 'notes/delete.php')->middleware('auth');

$route->get("/register" , "registration/create.php")->middleware('guest');
$route->post("/register" , "registration/store.php")->middleware('guest');

$route->get("/login" , "auth/create.php")->middleware("guest");
$route->post("/login" , "auth/store.php")->middleware("guest");

$route->get("/logout" , "auth/destroy.php")->middleware("auth");


