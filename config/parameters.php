<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define("base_url", "http://localhost/e-shop/");    
}else{
    define("base_url", "https://artemisa.alwaysdata.net/e-shop/");
}


define("controller_default", "productoController");
define("action_default", "index");