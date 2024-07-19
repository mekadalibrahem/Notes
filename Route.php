<?php 

/**
 * simple route class for routing use for any page in your web site 
 */
class Route{
    
    // list of route avilable in web site
    public static $routte_list = [
            "/" => "/public/home.php" ,
    ];


    /**
     * abort method for routing user to error page
     * @param mixed $code code for error ( you need to add file with named [error code].php)
     * @return void 
     */
    public static function abort($code = 404){
        require "/public/{$code}.php" ;
    }


    /**
     * route use to specifc page by uri requested   (if request not exists abort error 404 not found)
     * @param mixed $request uri for request 
     * @param mixed $routte_list route list will search for uri in it 
     * @return void
     */
    public static function route($request , $routte_list) {
        if(array_key_exists($request , $routte_list)) {
            require $routte_list[$request] ;
        }else{
           Route::abort(404);
        }
    }
}


//  use Route class  (you just need import this file in index.php file ) 
//  how use Route method 
//  defain or add your route to route_list in Route class
// call route class methods   

$uri =  parse_url($_SERVER['REQUEST_URI'])["path"];

Route::route($uri , Route::$routte_list);
