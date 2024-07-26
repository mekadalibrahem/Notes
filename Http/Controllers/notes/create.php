<?php

use App\Session;

view("notes/create.view.php", [
    "content" => "" ,
    "errors" => Session::get("errors") ?? [] ,
    "page_title" => "New Note" ,
    
]);
