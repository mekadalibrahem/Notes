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

