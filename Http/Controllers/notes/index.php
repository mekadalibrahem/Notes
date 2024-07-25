<?php

use App\Container;
use App\Database;
use App\Session;
$page_title = "Notes" ;
$current_user = Session::get("auth_user_id") ?? 0;

$db = Container::resolve(Database::class);
$user_id = $_GET['id'] ?? $current_user ;
$notes = [] ;

$notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id])->get();





view("notes/index.view.php" , [
    "page_title" => $page_title,
   
    "notes" => $notes,
]);
