<?php 
namespace App\Middleware;
use App\Session;

class Auth {
    
    

    public function handle(){
        if(!Session::has("auth_user_id")){
          header("location: /register");
        }
         
    }
}
