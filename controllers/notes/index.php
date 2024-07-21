<?php 
use App\Database;
$page_title = "Notes" ;
$config =require base_path("config.php");

$db = new Database($config['database']);

$notes = [] ;
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $notes = $db->query("SELECT * FROM `notes` WHERE user_id = ?" , [$user_id])->get();

} 



view("notes/index.view.php" , [
    "page_title" => $page_title,
    "config" => $config,
    "notes" => $notes,
]);
