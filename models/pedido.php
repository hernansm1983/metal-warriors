<?php

class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $costo;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsuarioId($usuario_id): void {
        $this->usuario_id = $usuario_id;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    public function setLocalidad($localidad): void {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    public function setDireccion($direccion): void {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function setCosto($costo): void {
        $this->costo = $costo;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setHora($hora): void {
        $this->hora = $hora;
    }

    
    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }
    
     
    public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }
    
    
    public function getOneByUser(){
        $sql = "SELECT p.id, p.usuario_id, p.costo FROM pedidos p "
               // . "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";
        
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
       
    }
    
    
    public function getProductosByPedido($id){
                
        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                . "WHERE lp.pedido_id={$id}";
        
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getUsuarioByPedido($id){
        
        $sql = "SELECT * FROM usuarios u "
                . "INNER JOIN pedidos p ON p.usuario_id = u.id "
                . "WHERE p.id={$id}";
        
        $usuario = $this->db->query($sql);
        return $usuario->fetch_object();
        
    }
    
    
    
    public function getAllByUser(){
        $sql = "SELECT p.* FROM pedidos p "
                . "WHERE p.usuario_id = {$this->getUsuarioId()} ORDER BY id DESC";
        
        $pedido = $this->db->query($sql);
        return $pedido;
       
    }
    
    
    
    public function save(){
        $sql = "INSERT INTO pedidos VALUES (null, '{$this->getUsuarioId()}', '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', '{$this->getCosto()}', 'confirmado', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    
    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        
        foreach ($_SESSION['carrito'] as $elemento) { 
           $producto = $elemento['producto'];
           
           $insert = "INSERT INTO lineas_pedidos VALUES(null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
           $save = $this->db->query($insert);
           
           $result = false;

            if($save){
                $result = true;
            }
        }
        
        return $result;
    }
    
    
    public function stock_update($id, $unidades_solicitadas){
        
        $sql = "SELECT * FROM productos WHERE id = {$id}";
        $query = $this->db->query($sql);
        $prod_id = $query->fetch_object();
        
        $nuevo_stock = $prod_id->stock - $unidades_solicitadas;
        
        $update = "UPDATE productos SET stock= {$nuevo_stock} WHERE id={$id}";
        echo $update.'<br/>'; 
        $save = $this->db->query($update);

        $result = false;

         if($save){
             $result = true;
         }
        
        return $result;
    }
    
    
    public function delete(){
        
            $sql = "DELETE FROM pedidos WHERE id={$this->id}";
            $delete= $this->db->query($sql);
            
            $result = false;
            
            if($delete){
                $result = true;
            }

            return $result;
    }
    
    /*
    public function deleteImage(){
        $sql = "UPDATE productos SET imagen = null WHERE id={$this->getId()};";
        
        //echo $sql; echo $img; die();
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
    */
 
    public function updateStatus(){
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id={$this->getId()};";
        
        //echo $sql; echo $img; die();
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    
}