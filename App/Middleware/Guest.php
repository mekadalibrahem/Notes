<?php 
namespace App\Middleware;


class Guest {


    public function handle(){
        if(auth()){
            header("location: /");
        }
    }
}
