<?php

use App\Container;
use App\Database;
$page_title = "Notes" ;


$db = Container::resolve(Database::class);

$notes = [] ;
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id])->get();

} 



view("notes/index.view.php" , [
    "page_title" => $page_title,
   
    "notes" => $notes,
]);
