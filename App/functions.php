<?php 
use App\Response;
use App\Route;
use App\Session;
function dd($value) { 

    echo "<pre>" ;
    var_dump($value);
    echo "</pre>"; 
    die();
}


function isUri($uri){
    $request =parse_url($_SERVER['REQUEST_URI']);
    $path = $request['path'];
    return $path === $uri ;
}


/**
 *  check if this operation avilable by condition
 * @param mixed $condition  condition to check if avilable or not ( if return false abort())
 * @param mixed $status what status will abort when not authorize by defult is Forbidden (403)
 * @return void
 */
function authorize($condition , $status = Response::FORBIDDEN){
    if(!$condition){
        Route::abort($status);
    }
}


/**
 * return full path starting from base path for project
 * @param mixed $path which concatenate with base path
 * @return string full path from base path
 */ 
function base_path($path){
    return  BASE_PATH . $path;
}


function view($path , $data = []){
    extract($data);
    require base_path("/views/$path" ) ;
}


function setRequestMethod($method = "GET"){
    $method = strtoupper(trim($method));
    return "<input type='hidden' name='__method' value='$method' />";
}


/**
 * return value form config file for nisted keys use  [ dot '.' ] a separator
 * @param mixed $key key for value which will return
 * @return string|Exception|null value or throwig Exeption
 */
function config($key){
    $config =  require  base_path("config.php");
    $value = null;
    // convert string to array by spicifc char
    $split_key =   explode(".", $key);
   
    foreach ($split_key as $i) {
        if(! array_key_exists($i , $config)) {
            throw new \Exception("Key not found  : {$key} ");
        }else{
            $value = $config[$i];
            $config = $value;
          
        }
        
    }
    return $value ;
}


function auth(){
    return Session::has('auth_user_id') ;
}

function login($user_id){
    Session::put("auth_user_id" , $user_id);
}
