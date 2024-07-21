<?php 

$page_title = "New Note" ;
$config = require "./config.php";
$db = new Database($config['database']) ;






require "./views/note-create.view.php";
