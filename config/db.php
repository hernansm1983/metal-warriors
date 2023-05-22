<?php

class Database{
    public static function connect(){
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            
            $db = new mysqli('localhost', 'root', '', 'e_shop');
            
        }else{
            
            $db = new mysqli('mysql-artemisa.alwaysdata.net', 'artemisa', '!Q2w3e4r%T', 'artemisa_eshop');
            
        }
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}


// Conexión
/*
if($_SERVER['SERVER_NAME'] == 'localhost'){
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $basededatos = 'blog_master';
}else{
    $servidor = 'mysql-artemisa.alwaysdata.net';
    $usuario = 'artemisa';
    $password = '!Q2w3e4r%T';
    $basededatos = 'artemisa_blog';
}
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}*/