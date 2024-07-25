<?php 
use App\Session;


Session::destroy();

header("location: /login");
