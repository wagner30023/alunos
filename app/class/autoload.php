<?php

function __autoload($class){
    $class = strtolower($class);
    $path = "app/class/{$class}.php";
    if(file_exists($path)):
        require_once $path;
    else:
        die("The file {$class}.php could not be found!");
    endif;
}

