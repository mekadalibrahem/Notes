<?php 
namespace App\Middleware;
use App\Authenticator;


class Guest {


    public function handle(){
        if((new Authenticator)->auth()){
            redirect("/");
        }
    }
}

