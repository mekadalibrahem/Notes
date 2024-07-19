<?php 

/**
 * simple route class for routing use for any page in your web site 
 */
class Route{
    
    // list of route avilable in web site
    public static $routte_list = [
            "/" => "./controllers/home.php" ,
    ];


    /**
     * abort method for routing user to error page
     * @param  $code code for error ( you need to add file with named [error code].php)
     * @return void 
     */
    public static function abort($code = 404){
        
        require "./views/errors/$code.php" ;
    }


    /**
     * route use to specifc page by uri requested   (if request not exists abort error 404 not found)
     * @param  $request uri for request 
     * @param  $routte_list route list will search for uri in it 
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


