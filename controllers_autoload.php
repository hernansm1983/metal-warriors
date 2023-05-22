<?php
//---se aplica sobre un directorio---

function autocargar($className){
    include 'controllers/'.$className.'.php';    
}

spl_autoload_register('autocargar');