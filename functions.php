<?php 

function dd($value) { 

    echo "<pre>" ;
    var_dump($value);
    echo "</pre>"; 
}


function isUri($uri){
    return $_SERVER['REQUEST_URI'] === $uri ;
}

