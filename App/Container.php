<?php 
namespace App; 

class   Container {
    public static $contant = [] ;



    public static function bind($key , $func) {

        Container::$contant[$key] = call_user_func($func); 
    }

    public static function resolve($key){
        if(!array_key_exists($key , self::$contant)){
            throw new  \Exception("Not matching binding found for your key [{$key}]");
        }else{
            return self::$contant[$key];
        }
    }
}
