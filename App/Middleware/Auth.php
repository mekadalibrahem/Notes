<?php 
namespace App\Middleware;


class Auth {
    
    

    public function handle(){
     
     
        if(!auth()){
          header("location: /login");
        }
         
    }
}
