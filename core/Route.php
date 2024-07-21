<?php 

/**
 * simple route class for routing user for any page in your web site 
 */
class Route{
    
  
    
    /**
     * abort method for routing user to error page
     * @param  $code code for error ( you need to add file with named [error code].php)
     * @return void 
     */
    public static function abort($code = 404){
        
        view("/errors/$code.php") ;
        die();
    }


    /**
     * route use to specifc page by uri requested   (if request not exists abort error 404 not found)
     * @param  $request uri for request 
     * @param  $route_list route list will search for uri in it 
     * @return void
     */
    public static function route($request , $route_list) {
       
        if(array_key_exists($request , $route_list)) {
            require $route_list[$request] ;
        }else{
            
           Route::abort(404);
        }
    }
}


