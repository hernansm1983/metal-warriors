<?php

require_once 'models/producto.php';


class productoController{
    
    public function index(){ // se encarga de mostrar los productos destacados en el index
        
        $producto = new Producto();
        $productos = $producto->getRandom(15);
        
        require "views/producto/destacados.php";
    }
    
    
    
    public function ver(){ // carga la vista del detalle de cada producto
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
                        
            $producto = new Producto();
            $producto->setId($id);
            
            $product = $producto->getOne();
            
            require_once 'views/producto/ver.php';
        }
    }
    
    
    
    public function gestion(){ // carga la lista de todos los productos 
        
        Utils::isAdmin();
        
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }
    
    
    
    public function crear(){ //carga ls vista de alta de productos
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    
    
    
    public function save(){ // Crea o edita un producto, segun reciba o no el ID
        
        Utils::isAdmin(); // si no es Admin, redirecciona al index
        if(isset($_POST)){
            $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if($categoria_id && $nombre && $descripcion && $precio && $stock){
                $producto = new Producto();
                $producto->setCategoriaId($categoria_id);
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                
                //Guardar Imagen
                if(isset($_FILES['imagen'])){
                    
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){


                        if(!is_dir('uploads')){
                            mkdir('uploads', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        $producto->setImagen($filename);
                    }
                }
                
                // si recibe el ID edita el producto, sino hace un INSERT
                if(isset($_GET['id'])){
                    
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                    
                }else{
                    $save = $producto->save();
                }
                
                if($save){
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
             
            }else{
                $_SESSION['producto'] = "failed";
            }
        }else{
            $_SESSION['producto'] = "failed";
        }
        header("location:".base_url."producto/gestion");
    }
    
    
    
    public function editar(){ //carga la vista de edicion del producto
        
        Utils::isAdmin(); // si no es Admin, redirecciona al index
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $editar = true;
            
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
            
            require_once 'views/producto/crear.php';
        }else{
            header('location:'.base_url.'producto/gestion');
        }
    }
    
    
    
    public function eliminar(){ // se encarga de eliminar un producto
        
        Utils::isAdmin(); // si no es Admin, redirecciona al index
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            
            $delete = $producto->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        
        header('location:'.base_url.'producto/gestion');
    }
    
    
    
    
    public function eliminarImagen(){ //se encarga de eliminar la imagen del producto existente
        
        Utils::isAdmin(); // si no es Admin, redirecciona al index
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $img = $_GET['img'];
            $producto = new Producto();
            $producto->setId($id);
            $producto->setImagen($img);
            $rutaImagen = 'uploads/images/'.$img;
            
            $deleteImg = $producto->deleteImage();
            clearstatcache();
            
           
            if($deleteImg){
                
                    chmod($rutaImagen, 0777);
                    if (file_exists($rutaImagen)) { 
                        
                        if($outPut= unlink($rutaImagen)){
                            $_SESSION['delete_img'] = 'La Imagen se ha Eliminado Correctamente';
                        }else{
                            $_SESSION['delete_img'] = 'Error! La imagen no ha sido Eliminada Correctamente';
                        }
                    } else { 
                        
                        $_SESSION['delete_img'] = 'No existe o no tienes permisos de escritura';
                    } 
            }else{
                $_SESSION['delete_img'] = 'Error! La Imagen no se ha podido eliminar de nuestra Base de Datos';
            }
        }else{
            $_SESSION['delete_img'] = 'Error! La imagen no se ha podido Eliminar';
        }
        
        header('location:'.base_url.'producto/editar&id='.$id);
    }
}