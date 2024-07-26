<?php



use App\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;

$form = new LoginForm();

// check if email and password valid  , check if email exists and
if($form->validate($email, $password)){
    if((new Authenticator())->attemp($email , $password)){
        redirect("/");
    }else{

        $form->addError("email","email or password wrong");
    }
}

view("auth/create.view.php", 
[
    "errors"=> $form->errors(),
    "page_title" => "Login",
]);
die();


    



