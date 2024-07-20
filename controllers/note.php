<?php 
$page_title = "Note" ;
$config = require "./config.php";
$db = new Database($config['database']);
$current_user = 1 ; // for this statae only
$ntoe_id = $_GET['id'];
$note = $db->query("SELECT * FROM `notes` WHERE id = ?" , [$ntoe_id])->findOrFail();


// check if this note belong for current user and can see it 
if($note['user_id'] !== $current_user){
    Route::abort(Response::FORBIDDEN);
   
}
require "./views/note.view.php";
