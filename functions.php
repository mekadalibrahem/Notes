<?php 

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
