<?php

use App\Authenticator;
use App\Container;
use App\Database;
use App\Session;
use Http\Forms\RegisterForm;
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$username  = $_POST["username"];


//  implement registeration  user

$register_form = new RegisterForm();

if(!$register_form->validate($username,$email,$password,$confirm_password)){
    
    Session::flush("errors" , $register_form->errors());
    redirect("/register");

}



$db = Container::resolve(Database::class);
$in = $db->query("INSERT INTO users(username, email,password) VALUES(:username , :email , :password)" , [
    "username" => $username ,
    "email" => $email,
    "password" => password_hash($password ,PASSWORD_BCRYPT),
]);

(new Authenticator())->attemp($email, $password);
redirect("/");
    



