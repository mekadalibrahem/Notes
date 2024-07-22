<?php 

use App\Database ;
use App\Validator; 
use App\Route ;
$current_user = 1 ;
$config = require base_path("config.php");
$db = new Database($config['database']);
$note_id = $_POST['id'];

if($note_id >0){
    // check if note exists 
    $note = $db->query("SELECT * FROM notes WHERE id = :id" , ["id" => $note_id])->findOrFail();
  
    authorize($note["user_id"] === $current_user) ;
    // if authorized 
    $db->query("DELETE FROM notes WHERE id = :id" , ["id" =>$note_id]);
    
    header("location: /notes");
}

