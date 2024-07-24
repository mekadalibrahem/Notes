<?php

use App\Container;
use App\Database;
use App\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$username  = $_POST["username"];
$errors = [];

//  implement registeration  user

if(!Validator::string($username , 3,100)){
    $errors["username"] = "this value should be at last 3-100 characters";
}

if(!Validator::email($email)){
    $errors["email"] =  "this email invalid";
}
if(!Validator::string($password , 8 , 50)){
    $errors["password"] = "this value should be at last 8-50 characters";
}

if(Validator::equal($password , $confirm_password)){
    $errors["confirm_password"] = "Password and confirmation don't matching";
}

if(Validator::exists($email, "users" , "email")){
    $errors["email"] =  "this email alrady exists";
}
if(Validator::exists($username , 'users' , 'username')) {
    $errors["username"] =  "this username alrady exists";
}

if(!empty($errors)){
    
    view("registration/create.view.php", 
        [
            "page_title" => "register" , 
            'errors' => $errors
        ]
    );

}
// register new user 
$db = Container::resolve(Database::class);
$in = $db->query("INSERT INTO users(username, email,password) VALUES(:username , :email , :password)" , [
    "username" => $username ,
    "email" => $email,
    "password" => $password
]);

header("location: /register");







