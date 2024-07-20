<?php 
$page_title = "Notes" ;
$config = require "./config.php";

$db = new Database($config['database']);

$notes = [] ; 
$user_id = $_GET['id'];
$query_result = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id]) ;
$notes = $query_result->fetchAll(PDO::FETCH_ASSOC);

require "./views/notes.view.php";
