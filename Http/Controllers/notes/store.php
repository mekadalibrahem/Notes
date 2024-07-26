<?php

use App\Container;
use App\Database;
use App\Validator;
use App\Session;
$page_title = "New Note" ;

$db = Container::resolve(Database::class);
$errors = [] ;
$content = "" ;

// get request data and save new note 
$content = $_POST['content'];
// defain errors list if found any error 


if(!Validator::string($content ,1,1000)){
    $errors[] = 'content is invalid is required and not more that 1,..., 1000 characters';
}
if(!empty($errors)){

    view("notes/create.view.php", [
        "content" => $content ,
        "errors" => $errors ,
        "page_title" => $page_title ,
       
    ]);
   
  
}else{
    $db->query("INSERT INTO notes(content , user_id) VALUES(:content ,:user_id)",[
        "content"=> $content,
        "user_id" => Session::get("auth_user_id") ?? 0
    ]);
    
    redirect("/notes");
}







