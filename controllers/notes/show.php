<?php

use App\Container;
use App\Database ;
use App\Session;
$page_title = "Note" ;

$db = Container::resolve(Database::class);
$current_user = Session::get("auth_user_id") ?? 0 ; // for this statae only
$note_id = $_GET['id'] ?? 0;
$note = null;

$note = $db->query("SELECT * FROM `notes` WHERE id = :id" , ["id"=>$note_id])->findOrFail();
authorize($note['user_id'] === $current_user);
view("notes/show.view.php" , [
    "page_title" => $page_title,
    
    "note" => $note,
]);









