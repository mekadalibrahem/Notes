<?php 
use App\Authenticator;



(new Authenticator())->logout();
redirect("/login");
