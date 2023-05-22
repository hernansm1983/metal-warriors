<?php

class Utils{
    
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    
    
    public static function mostrarError($errores, $campo){
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div id='mensaje_false'>".$errores[$campo].'</div>';
	}
	return $alerta;
    }
    
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("location:".base_url);
        }else{
            return true;
        }
    }
    
    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("location:".base_url);
        }else{
            return true;
        }
    }
    
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    
    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'unidades_totales' => 0,
            'total' => 0
        );
        
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach($_SESSION['carrito'] as $producto){
                $stats['total'] += $producto['precio'] * $producto['unidades'];
                $stats['unidades_totales'] += $producto['unidades'];
            }
        }
        
        
        return $stats;
    }
    
    
    public static function showStatus($status){
        
            $value = 'Pendiente';
            
        if($status == 'confirmado'){
            
            $value = 'Pendiente';
            
        }elseif($status == 'preparacion'){
            
            $value = 'En Preparacion';
            
        }elseif($status == 'listo'){
            
            $value = 'Listo';
            
        }elseif($status == 'enviado'){
            
            $value = 'Enviado';
            
        }
        
        return $value;
    }
}


