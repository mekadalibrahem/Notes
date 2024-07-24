<?php 

namespace App\Middleware;

class Middleware {
    public const MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];


    public static function resolve($key){
        if(!$key){
            return ;
        }
        
        $middleware  = Middleware::MAP[$key] ?? false; 
        if(!$middleware){
        
            throw new \Exception("No matching middleware found for key : '{$key}'");
        
        }
        (new $middleware())->handle();
        
    }
}
