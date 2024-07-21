<?php 
require "./Validator.php";
$page_title = "New Note" ;
$config = require "./config.php";
$db = new Database($config['database']) ;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    // get request data and save new note 
    $content = $_POST['content'];
    // defain errors list if found any error 
    $errors = [] ;
    
    if(!Validator::string($content ,1,1000)){
        $errors[] = 'content is invalid is required and not more that 1,..., 1000 characters';
    }
    if(empty($errors)){
        $db->query("INSERT INTO notes(content , user_id) VALUES(:content ,:user_id)",[
            "content"=> $content,
            "user_id" => 1 
        ]);
    }

}





require "./views/notes/create.view.php";
