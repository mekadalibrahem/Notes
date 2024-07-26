<?php

use App\Authenticator;
use App\Container;
use App\Database ;
use App\Session;
$page_title = "Note" ;

$db = Container::resolve(Database::class);
$user = (new Authenticator())->user();
$note_id = $_GET['id'] ?? 0;
$note = null;

$note = $db->query("SELECT * FROM `notes` WHERE id = :id" , ["id"=>$note_id])->findOrFail();
authorize($note['user_id'] === $user['id']);
view("notes/show.view.php" , [
    "page_title" => $page_title,
    
    "note" => $note,
]);









