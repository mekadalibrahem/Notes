<?php 
$page_title = "Note" ;
$config = require "./config.php";
$db = new Database($config['database']);
$current_user = 1 ; // for this statae only
$ntoe_id = $_GET['id'];
$note = $db->query("SELECT * FROM `notes` WHERE id = ?" , [$ntoe_id])->findOrFail();


authorize($note['user_id'] === $current_user);


require "./views/note.view.php";
