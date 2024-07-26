<?php

use App\Authenticator;
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

    Session::flush("errors" , $errors);
    redirect("/note/create");
    
   
  
}else{
    $user = (new Authenticator())->user() ;
    
    $db->query("INSERT INTO notes(content , user_id) VALUES(:content ,:user_id)",[
       
        "content"=> $content,
        "user_id" => $user['id'],
    ]);
    
    redirect("/notes");
}







