<?php

use App\Authenticator;
use App\Container;
use App\Database;

$page_title = "Notes" ;
$user = (new Authenticator())->user();
$db = Container::resolve(Database::class);
$notes = [] ;

$notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user['id']])->get();





view("notes/index.view.php" , [
    "page_title" => $page_title,
    "notes" => $notes,
]);
