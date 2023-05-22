<?php
require_once 'models/pedido.php';
require_once 'models/producto.php';

class pedidoController{
    
    
    public function hacer(){
        
        require_once 'views/pedido/hacer.php';
    }
    
    public function confirmado(){
        if(isset($_SESSION['identity'])){
            
            $usuario_id = $_SESSION['identity']->id;
            
            $pedido = new Pedido();
            $pedido->setUsuarioId($usuario_id);
            $pedido_confirmado = $pedido->getOneByUser();
            
            $pedido_productos = new Pedido();
            
            $productos = $pedido_productos->getProductosByPedido($pedido_confirmado->id);
            
            //showArray($pedido_productos);
        }
        require_once 'views/pedido/confirmado.php';
    }
    
    
    
    public function add(){
        if(isset($_SESSION['identity'])){
            
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $costo = $stats['total'];
            
            if($provincia && $localidad && $direccion){
                // Guardar datos en la DB
                $pedido = new Pedido();
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia); 
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCosto($costo);
                
                $save = $pedido->save();
                
                // Guardar Linea Pedido
                $save_linea = $pedido->save_linea();
                                
                $carrito = $_SESSION['carrito'];
                
                // actualiza el stock
                foreach ($carrito as $elemento) {
                    
                   $actualiza_stock = $pedido->stock_update($elemento['id_producto'], $elemento['unidades']);
                }
                
                
                if($save && $save_linea){
                    $_SESSION['pedido'] = 'complete';
                    Utils::deleteSession('carrito'); 
                }else{
                    $_SESSION['pedido'] = 'failed';
                }
                
                //showArray($pedido);
            }else{
                $_SESSION['pedido'] = 'failed';
            }
            
            header('location:'.base_url.'pedido/confirmado');
            
        }else{
            header("location:".base_url);
        }
    }
    
    
    public function mis_pedidos(){
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        
        //sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        
        $pedidos = $pedido->getAllByUser();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    
    public function detalle(){
        Utils::isIdentity();
        
        if(isset($_GET['id'])){
            $pedido_id = $_GET['id'];
            
            //sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            
            $pedido_detalles = $pedido->getOne();
            
            //sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido_id);
            
            $datos_usuario = new Pedido();
            $datos = $datos_usuario->getUsuarioByPedido($pedido_id);
            
        }else{
            header('location:'.base_url.'pedido/mis_pedidos');
        }
        
        require_once 'views/pedido/detalle.php';
    }
    
    
    public function gestion(){
        Utils::isAdmin();
        $gestion = true;
        
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    
    public function estado(){
        Utils::isAdmin();
        $gestion = true;
        
        if(isset($_POST['estado']) && isset($_POST['pedido_id'])){
            
            // hacemos el update del estado del pedido
            $estado = $_POST['estado'];
            $pedido_id = $_POST['pedido_id'];
            
            $pedido = new Pedido();
            $pedido->setId($pedido_id);
            $pedido->setEstado($estado); 
            $update = $pedido->updateStatus();
            
            if($update){
                $_SESSION['update'] = 'complete';
                header('location:'.base_url.'pedido/detalle&id='.$pedido_id);
            }else{
                $_SESSION['update'] = 'failed';
            }
        }else{
            header('location:'.base_url);
        }
        
        
    }
    
}