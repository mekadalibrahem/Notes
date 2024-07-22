<?php

use App\Container;
use App\Database ;
use App\Validator; 

$current_user = 1 ;

$db = Container::resolve(Database::class);

$note_id = $_POST['id'];

if($note_id >0){
    // check if note exists 
    $note = $db->query("SELECT * FROM notes WHERE id = :id" , ["id" => $note_id])->findOrFail();
  
    authorize($note["user_id"] === $current_user) ;
    // if authorized 
    $db->query("DELETE FROM notes WHERE id = :id" , ["id" =>$note_id]);
    
    header("location: /notes");
}

