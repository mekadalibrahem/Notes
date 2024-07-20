<?php 
$page_title = "Note" ;
$config = require "./config.php";
$db = new Database($config['database']);
$ntoe_id = $_GET['id'];
$query_result = $db->query("SELECT * FROM `notes` WHERE id = ?" , [$ntoe_id]);
$note = $query_result->fetch(PDO::FETCH_ASSOC);

require "./views/note.view.php";
