<?php

use App\Container;
use App\Database;
use App\Validator;

$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;
$errors = [];
$db = Container::resolve(Database::class);
if(!Validator::email($email)) {
    $errors["email"] = 'Invalid email address';
}
if(!Validator::string($password, 5,50)) {
    $errors['password'] = 'password is required and should be 5-50 charachters';
}
if(!empty($errors)){
    view("auth/create.view.php", 
    [
        "errors"=> $errors,
       "page_title" => "Login",
    
    ]);
    die();
}
$user =    $db->query("SELECT * FROM users WHERE email = :email",["email" =>$email])->find();

if(!$user){
    $errors["email"] = "Wrong email dosn't esists";
}else{
    if(!password_verify($password,$user['password'])){
        $errors['password'] = "Wrong Password"; 
    }
      
}
if(!empty($errors)){
    view("auth/create.view.php", 
    [
        "errors"=> $errors,
        "page_title" => "Login",
    ]);
    die();
}

login($user['id']);
header('location: /notes');

