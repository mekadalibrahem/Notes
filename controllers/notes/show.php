<?php 
use App\Database ;
$page_title = "Note" ;
$config = require base_path("config.php");
$db = new Database($config['database']);
$current_user = 1 ; // for this statae only
$ntoe_id = $_GET['id'] ?? 0;
$note = null;
if($ntoe_id >0){
    $note = $db->query("SELECT * FROM `notes` WHERE id = ?" , [$ntoe_id])->findOrFail();
    authorize($note['user_id'] === $current_user);
}







view("notes/show.view.php" , [
    "page_title" => $page_title,
    "config" => $config,
    "note" => $note,
]);
