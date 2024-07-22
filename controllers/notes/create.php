<?php 

$page_title = "New Note" ;
$config = require base_path("config.php");
$errors = [] ;
$content = "" ;






view("notes/create.view.php", [
    "content" => $content ,
    "errors" => $errors ,
    "page_title" => $page_title ,
    'config' => $config,
]);
