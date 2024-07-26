<?php 
namespace App\Middleware;
use App\Authenticator;


class Auth {
    
    

    public function handle(){
     
     
        if(!(new Authenticator())->auth()){
          redirect("/login");
        }
         
    }
}
