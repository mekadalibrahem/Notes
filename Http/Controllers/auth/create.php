<?php

use App\Session;

view("auth/create.view.php", [
    'page_title' => "Login",
    'errors' => Session::get('errors') ?? [],
]);
