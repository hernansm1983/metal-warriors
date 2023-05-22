<?php

class Database{
    public static function connect(){
        $db = new mysqli('mysql-artemisa.alwaysdata.net', 'root', '', 'e_shop');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}