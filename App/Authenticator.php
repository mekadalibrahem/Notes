<?php 
namespace App;

class Authenticator {

    public function attemp($email , $password) {
        if($this->cardinate_verify( $email , $password )) {
            $this->login( $email );
            return true;
        }else{
            return false;
        }
    }

    public  function login($email){
        Session::put("auth_user_email" , $email);
    }

    public function logout(){
        Session::destroy();
    }

    protected function cardinate_verify($email , $password){
        $db = Container::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email" ,["email" =>$email])->find();
        return password_verify($password , $user["password"]);
    }

    public function auth(){
        return Session::get('auth_user_email' , false) ;
    }

    public function user(){
        $email = $this->auth();
        $db= Container::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email" ,["email" =>$email])->find();
        return $user ;
    }
    
}
