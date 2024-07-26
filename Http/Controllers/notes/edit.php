<?php

use App\Authenticator;
use App\Container;
use App\Database;
use App\Route;
use App\Session;
$db = Container::resolve(Database::class);
$current_user = (new Authenticator())->user();
$id = $_GET['id'] ?? 0 ;

// check if id valid 
if(!$id){
    Route::abort();
}


$note = $db->query("SELECT * FROM notes WHERE id= :id" , ["id" => $id])->findOrFail();
authorize($note['user_id'] === $current_user['id']);


view("notes/edit.view.php" , [
    "page_title" => "Edit Note",
    "note" => $note ,
    "errors" => Session::get("errors") ?? [] 
]);
