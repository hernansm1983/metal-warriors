<?php
require_once 'models/producto.php';


class carritoController{
    
    
    public function index(){
       
        if(isset($_SESSION['carrito'])) $carrito = $_SESSION['carrito'];
        require_once 'views/carrito/index.php';
    }
    
    
    public function add(){
    
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header("location:".base_url);
        }
        
        if(isset($_SESSION['carrito'])){
            $counter = 0;
            //$_SESSION['carrito']['items']=0;
            foreach($_SESSION['carrito'] AS $indice=>$elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                    //$_SESSION['carrito']['items']++;
                }
            }
            
        }
        
        if(!isset($counter) || $counter == 0){
            // Conseguir Producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            
            // Anadir al Carrito
            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );    
            }
        }
        header("location:".base_url."carrito/index");
    }
    
    public function up(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        
        header("location:".base_url."carrito/index");
    }
    
    
    public function down(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            if($_SESSION['carrito'][$index]['unidades'] > 1){
                $_SESSION['carrito'][$index]['unidades']--;    
            }
            
        }
        
        header("location:".base_url."carrito/index");
    }
    
    
    public function remove(){
        
        if(isset($_GET['index'])){
            $index = $_GET['index'];
           
            unset($_SESSION['carrito'][$index]);
        
        }
        header('location:'.base_url.'carrito/index');
   
    }
    
    
    public function delete_all(){
        
        unset($_SESSION['carrito']);
        header("location:".base_url);
        
    }
    
}