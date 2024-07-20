<?php 
$page_title = "Notes" ;
$config = require "./config.php";

$db = new Database($config['database']);

$notes = [] ; 
$user_id = $_GET['id'];
$notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id])->get();

require "./views/notes.view.php";
