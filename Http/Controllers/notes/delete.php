<?php

use App\Authenticator;
use App\Container;
use App\Database ;
use App\Validator; 
use App\Session;

$user = (new Authenticator())->user();

$db = Container::resolve(Database::class);

$note_id = $_POST['id'];

if($note_id >0){
    // check if note exists 
    if(Validator::exists($note_id , 'notes' , 'id')){
        authorize($note["user_id"] === $user['id']) ;
        // if authorized 
        $db->query("DELETE FROM notes WHERE id = :id" , ["id" =>$note_id]);
        
        redirect("/notes");
       
    }    
}




