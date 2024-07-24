<?php 
namespace App ;
use App\Middleware\Middleware;
/**
 * simple route class for routing user for any page in your web site 
 */
class Route{
    

    protected $routes = [] ;


    public function __construct(){}

    /**
     * register new route in route list 
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @param mixed $method method (GET, POST ....)
     * @return void
     */
    protected function register($uri , $controller , $method){
        $this->routes[] =[
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            "middleware" => null ,
        ];
        return $this;
    }

     /**
     * register new route in route list with [GET] method
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @return void
     */
    public function get($uri , $controller){
        $this->register($uri,$controller, "GET");
        return $this;
    }
    /**
     * register new route in route list with [POST] method
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @return void
     */
    public function post($uri , $controller){
        $this->register($uri,$controller, "POST");
        return $this;
    }
    /**
     * register new route in route list with [DELETE] method
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @return void
     */
    public function delete($uri , $controller){
        $this->register($uri,$controller, "DELETE");
        return $this;
    }
    /**
     * register new route in route list with [PUT] method
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @return void
     */
    public function put($uri , $controller){
        $this->register($uri,$controller, "PUT");
        return $this;
    }
    /**
     * register new route in route list with [PATCH] method
     * @param mixed $uri request uri 
     * @param mixed $controller path for controller
     * @return void
     */
    public function patch($uri , $controller){
        $this->register($uri,$controller, "PATCH");
        return $this;
    }
  
    
    /**
     * abort method for routing user to error page
     * @param  $code code for error ( you need to add file with named [error code].php)
     * @return void 
     */
    public  static function abort($code = 404){
        
        view("/errors/$code.php") ;
        die();
    }

   

    /**
     * route use to specifc page by uri requested   (if request not exists abort error 404 not found)
     * @param  $request uri for request 
     * @return void 
     */
    public  function route($request) {
       $method = $this->getMthodRequest();
        // var for save state if found route or not
       $found = false;
       
        foreach($this->routes as $route){
            if($route['uri'] === $request && $route['method'] === $method){
                $found = true ;
                if($route['middleware']){
                    Middleware::resolve($route['middleware']);
                    
                }
                
                require base_path($route['controller']);
               
            }
        }
        // route not found  ->  abort user 
        if(!$found){
            Route::abort();
        }

        
        
        
    }

    public function getMthodRequest(){
        return strtoupper($_POST['__method'] ?? $_SERVER['REQUEST_METHOD']);   
    }

    public function middleware($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
}


