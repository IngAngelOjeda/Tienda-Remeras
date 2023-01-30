<?php

require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo 'Controlador Usuarios, Accion index'; 
    }

    public function registro(){
        require_once './views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($nombre && $apellido && $email && $password){
                
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
    
                $save= $usuario->save();

                if($save){

                    $_SESSION['register']= "complete";
    
                }else{
    
                    $_SESSION['register']= "failed";

                }

            }else{

                $_SESSION['register']= "failed";

            }

        }else{

            $_SESSION['register']= "failed";

        }

        header("Location:".base_url.'usuario/registro');

    }

    public function login(){
        if(isset($_POST)){
            //Identeficar usuario

            //Consulta para comprobar usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity&& is_object($identity)){

                //Crear session si es un usuario normal
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){

                    //Creamos una session si es admin
                    $_SESSION['admin'] = true;

                }

            }else{

                $_SESSION['error_login'] = 'Identificacion Fallida';

            }

        }
        
        header('Location:'.base_url);
    }

    public function logout(){

        //Comprobamos si existe la session y la deshabilitamos
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        //Comprobamos si existe la session de admin y la dashabilitamos
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);

    }

}





