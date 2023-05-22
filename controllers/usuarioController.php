<?php

require_once 'models/usuario.php';

class usuarioController{
    
    public function index(){
        echo "Controlador USUARIOS accion INDEX";
        require_once 'views/producto/destacados.php';
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    
    public function save(){
        
        if(isset($_POST)){
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
            $password1 = isset($_POST['password1']) ? $_POST['password1'] : false;
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : false;
            
            //GUARDAMOS LOS DATOS INGRESADOS PARA USARLOS EN CASO DE ERRORES
            $_SESSION['datos_registro']['nombre'] = $_POST['nombre'];
            $_SESSION['datos_registro']['apellido'] = $_POST['apellido'];
            $_SESSION['datos_registro']['email'] = $_POST['email'];
            
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

            // Validar apellidos
            if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
                    $apellido_validado = true;
            }else{
                    $apellido_validado = false;
                    $errores['apellido'] = "El apellido no es válido, no debe contener numeros";
            }

            // Validar el email
            if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $email_validado = true;
            }else{
                    $email_validado = false;
                    $errores['email'] = "El email no es válido";
            }

            // Validar la contraseña
            if(!empty($password1) && !empty($password2) ){
                
                if($password1 == $password2){
                    $password_validado = true;    
                }else{
                    $password_validado = false;
                    $errores['password2'] = "Las contraseñas deben ser iguales";
                }
                    
            }else{
                    $password_validado = false;
                    $errores['password2'] = "Las contraseñas no deben estar vacías";
            }
            
            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setEmail($email);
            $usuario->setPassword($password1);
            
            $guardar_usuario = false;
	
            if(count($errores) == 0){
                
                    $guardar_usuario = true;
            
                    $save = $usuario->save();
                    
                    if($save){
                        $_SESSION['register'] = "Complete";
                        //BORRA LOS CAMPOS INGRESADOS DEL REGISTRO
                        Utils::deleteSession('datos_registro');
                    }else{
                        $_SESSION['register'] = "Failed";
                    }
                }else{
                    $_SESSION['register'] = $errores;
                }
        }
        header("Location:".base_url.'usuario/registro');
    }
    
    
    public function login(){
        
        if(isset($_POST)){
            //IDENTIFICAR AL USUARIO
            //CONSULTA A LA BASE DE DATOS
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();
            
            //CREAR LA SESION
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificacion Fallida';
            }
        }
        header("Location:".base_url);
    }
    
    
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}