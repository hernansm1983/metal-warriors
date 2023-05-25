<?php
require_once 'models/pedido.php';
require_once 'models/producto.php';

class pedidoController{
    
    
    public function hacer(){ // carga ls vista de datos de envio del pedido
        
        require_once 'views/pedido/hacer.php';
    }
    
    
    
    public function confirmado(){ // se encarga de confirmar el pedido
        
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
    
    
    
    public function mis_pedidos(){ // se encarga de mostrar solo los pedidos hechos por el usuario
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        
        //sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        
        $pedidos = $pedido->getAllByUser();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    
    
    public function detalle(){ // se encarga de mostrar el detalle del pedido
        
        Utils::isIdentity(); //si no esta logueado, redirecciona
        
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
    
    
    
    public function gestion(){ // se encarga de mostrar la lista de todos los pedidos
        
        Utils::isAdmin(); // si no es Admin, redirecciona
        $gestion = true;
        
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    
    
    public function estado(){ // se encarga de modificar el estado de un pedido
        
        Utils::isAdmin(); // si no es admin, redirecciona
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