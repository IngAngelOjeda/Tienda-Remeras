<?php

class Utils{

    //funcion para poner la session en null
    public static function deleteSession($nombre){

        if(isset($_SESSION[$nombre])){

            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);

        }

        return $nombre;

    }

    //funcion para comprobar si es admin
    public static function isAdmid(){

        if(!isset($_SESSION['admin'])){

            header('Location:'.base_url);

        }else{

            return true;

        }

    }

    public static function showCategorias(){

        require_once 'models/categoria.php';
        $categorias = new Categoria();
        $categorias = $categorias->getAll();

        return $categorias;
    }
    
}

?>