<?php 

$config =require base_path("config.php");


view("home.view.php" , [
    "page_title" => "Home",
    "config" => $config,
]);
