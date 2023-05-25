<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    
    public function index(){ // listado de todas las categorias
        
        Utils::isAdmin(); //Si no es Admin redirecciona al Index
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/index.php';
    }
    
    
    public function lista(){
        
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/lista.php';
    }
    
    
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            // Conseguir Categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            
            // Conseguir productos
            $producto = new Producto();
            $producto->setCategoriaId($id);
            $productos = $producto->getAllCategory();
            
        }
        require_once 'views/categoria/ver.php';
    }
    
    
    
    public function editar(){ // carga la vista de edicion
        
        Utils::isAdmin(); //Si no es Admin redirecciona al Index
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $editar = true;
            
            // Conseguir Categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();
                       
            require_once 'views/categoria/crear.php';
        }else{
            header('location:'.base_url.'categoria/index');
        }
        
    }
    
    
        
    public function crear(){ // carga la vista de alta de nuevas categorias
        Utils::isAdmin(); //Si no es Admin redirecciona al Index
        require_once 'views/categoria/crear.php';
    }
    
    
    
    public function save(){ // se encarga de crear o editar, segun reciba o no el ID
        
        Utils::isAdmin(); //Si no es Admin redirecciona al Index
        if(isset($_POST)){
            //showArray($_SESSION);
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
           
            //GUARDAMOS LOS DATOS INGRESADOS PARA USARLOS EN CASO DE ERRORES
            //$_SESSION['datos_categoria']['nombre'] = $_POST['nombre'];
            
            // Array de errores
            $errores = array();

            // Validar los datos antes de guardarlos en la base de datos
            // Validar campo nombre
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                    $nombre_validado = true;
            }else{
                    $nombre_validado = false;
                    $errores['nombre'] = "El nombre no es válido, no debe contener numeros";
            }
            
            $categoria = new Categoria();
            $categoria->setNombre($nombre);
            
            $guardar_categoria = false;
            
            if(count($errores) == 0){
                
                    $guardar_categoria = true;
                    
                    // si recibe el ID hace el UPDATE, sino crea una nueva categoria
                    if(isset($_GET['id'])){
                        
                        $id = $_GET['id'];
                        $categoria->setId($id);
                        $save = $categoria->edit();
                        
                    }else{
                        $save = $categoria->save();    
                    }
                    
                                        
                    if($save){
                        $_SESSION['nueva_categoria'] = "complete";
                       
                    }else{
                        $_SESSION['nueva_categoria'] = "failed";
                    }
                }else{
                    $_SESSION['nueva_categoria'] = $errores;
                }
        
        header("Location:".base_url.'categoria/index');
        }
    }
    
    
    
    public function delete(){ // elimina una categoria
        
        Utils::isAdmin(); //Si no es Admin redirecciona al Index
        if(isset($_GET['id'])){
            $categoria_id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($categoria_id);
            $delete = $categoria->delete();
            
            if($delete){
                $_SESSION['delete_categoria'] = "complete";
            }else{
                $_SESSION['delete_categoria'] = "failed";
            }
        }
        header("Location:".base_url.'categoria/index');
    }
}