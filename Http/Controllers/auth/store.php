<?php

use App\Container;
use App\Database;

use Http\Forms\LoginForm;
$db = Container::resolve(Database::class);
$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;

$form = new LoginForm();

if(!$form->validate($email, $password)){
    view("auth/create.view.php", 
    [
        "errors"=> $form->errors(),
        "page_title" => "Login",
    ]);
    die();
}else{
    $db = Container::resolve(Database::class);
    $user = $db->query("SELECT * FROM users WHERE email= :email ", ["email"=>$email])->find();
    login($user['id']);
    header('location: /notes');
}
       



