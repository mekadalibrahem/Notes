<?php

use App\Session;

view("registration/create.view.php", [
    "page_title" => "register" ,
    "errors" => Session::get("errors") 
]);
