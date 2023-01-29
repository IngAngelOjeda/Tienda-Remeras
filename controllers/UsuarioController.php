<?php

require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo 'Controlador Usuarios, Accion index'; 
    }
}

class registro{
    public function index(){
        require_once './views/usuario/registro.php';
    }
}

class save{
    public function index(){
        if(isset($_POST)){
            $usuario = new Usuario();
        }
    }
}