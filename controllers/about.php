<?php 

$config = require base_path("config.php");

view("about.view.php" , [
    "page_title" => "About",
    "config" => $config,
]);
