<?php

use App\Container;
use App\Database;
$page_title = "Notes" ;
$current_user = 1;

$db = Container::resolve(Database::class);
$user_id = $_GET['id'] ?? $current_user ;
$notes = [] ;

$notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id])->get();





view("notes/index.view.php" , [
    "page_title" => $page_title,
   
    "notes" => $notes,
]);
