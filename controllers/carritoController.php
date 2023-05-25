<?php
require_once 'models/producto.php';


class carritoController{
    
    
    public function index(){ // carga el index del carrito de compra
       
        if(isset($_SESSION['carrito'])) $carrito = $_SESSION['carrito'];
        require_once 'views/carrito/index.php';
    }
    
    
    
    public function add(){ // se encarga de agregar al carrito el producto elegido
    
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
    
    
    
    public function up(){ // se encarga de agregar una unidad al carrito
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        
        header("location:".base_url."carrito/index");
    }
    
    
    
    public function down(){ // se encarga de restar una unidad al carrito
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            if($_SESSION['carrito'][$index]['unidades'] > 1){
                $_SESSION['carrito'][$index]['unidades']--;    
            }
            
        }
        
        header("location:".base_url."carrito/index");
    }
    
    
    
    public function remove(){ // se encarga de eliminar un producto del carrito
        
        if(isset($_GET['index'])){
            $index = $_GET['index'];
           
            unset($_SESSION['carrito'][$index]);
        
        }
        header('location:'.base_url.'carrito/index');
   
    }
    
    
    
    public function delete_all(){ // se encarga de vaciar el carrito
        
        unset($_SESSION['carrito']);
        header("location:".base_url);
        
    }
    
}