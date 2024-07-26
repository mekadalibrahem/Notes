<?php



use App\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;

$form = new LoginForm();

// check if email and password valid  , check if email exists and check if password currect
if(!$form->validate($email, $password)){
    view("auth/create.view.php", 
    [
        "errors"=> $form->errors(),
        "page_title" => "Login",
    ]);
    die();
}else{
    if((new Authenticator())->attemp($email , $password)){
        redirect("/");
    }else{
       
        view("auth/create.view.php", 
        [
            "errors"=> ['password' => "email or password wrong"],
            "page_title" => "Login",
        ]);
    }
   
}
       



