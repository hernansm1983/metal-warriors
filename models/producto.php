<?php 


class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCategoriaId($categoria_id): void {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio): void {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock): void {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta): void {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    
    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
                . "INNER JOIN categorias c ON c.id = p.categoria_id "
                . "WHERE p.categoria_id = {$this->getCategoriaId()} AND stock > 0 "
                . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos WHERE stock > 0 ORDER BY RAND() LIMIT $limit");
        return $productos;
    }
    
    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }
    
    public function save(){
        $sql = "INSERT INTO productos VALUES (null, '{$this->getCategoriaId()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', null, CURDATE(), '{$this->getImagen()}')";
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    public function edit(){
        $sql = "UPDATE productos SET categoria_id='{$this->getCategoriaId()}', nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}'";
        
        //Si se cambia la imagen la guardamos
        if($this->getImagen() != null){
            $sql.=", imagen='{$this->getImagen()}'";
        }
        
        $sql.=" WHERE id={$this->getId()};";
        //echo $sql; die();
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    
    public function delete(){
        
            $sql = "DELETE FROM productos WHERE id={$this->id}";
            $delete= $this->db->query($sql);
            
            $result = false;
            
            if($delete){
                $result = true;
            }

            return $result;
    }
    
    
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
}    