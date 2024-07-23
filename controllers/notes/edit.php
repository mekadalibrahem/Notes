<?php

use App\Container;
use App\Database;
use App\Route;
use App\Validator ;

$db = Container::resolve(Database::class);
$current_user = 1 ;
$id = $_GET['id'] ?? 0 ;

// check if id valid 
if(!$id){
    Route::abort();
}


$note = $db->query("SELECT * FROM notes WHERE id= :id" , ["id" => $id])->findOrFail();
authorize($note['user_id'] === $current_user);


view("notes/edit.view.php" , [
    "page_title" => "Edit Note",
    "note" => $note ,
    "errors" => [] 
]);
