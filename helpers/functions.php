<?php


//---FUNCION PARA VER ARRAYS CON FORMATO---
 function showArray($var) 
 { 
      $debug = debug_backtrace();
      echo "<pre>";
      echo $debug[0]['file']." ".$debug[0]['line']."<br><br>";
      print_r($var); 
      echo "</pre>";
 }