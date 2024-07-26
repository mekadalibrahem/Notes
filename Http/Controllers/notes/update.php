<?php


use App\Container;
use App\Database;
use App\Route;
use App\Session;
use App\Validator ;

$db = Container::resolve(Database::class);
$current_user = Session::get("auth_user_id") ?? 0;
$id = $_POST['note_id'] ?? 0 ;
$content = $_POST['content'];
$errors = [] ;
// check if id valid 
if(!$id){
    Route::abort();
}
// valid new note contenet  
if(!Validator::string($content ,1,1000)){
    $errors[] ='content is invalid is required and not more that 1,..., 1000 characters' ;
}


$note = $db->query("SELECT * FROM notes WHERE id= :id" , ["id" => $id])->findOrFail();
authorize($note['user_id'] === $current_user);



if(!empty($errors)){
    Session::flush("errors" , $errors);
    redirect("/notes/edit");
  
}else{
     $db->query("UPDATE `notes` SET `content`=:content WHERE id=:id" , ["content" => $content , "id" => $id]);
     redirect("location: /notes");
}

