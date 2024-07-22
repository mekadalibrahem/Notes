<?php 

view("notes/create.view.php", [
    "content" => "" ,
    "errors" => [] ,
    "page_title" => "New Note" ,
    'config' => require base_path("config.php")
]);
