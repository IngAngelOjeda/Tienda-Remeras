<?php
session_start();
//incluimos el autoload
require_once 'autoload.php';
//incluimos la conexion de la db
require_once '/assets/config/db.php';
//incluimos los parametros de los controladores por defecto, url y acciones
require_once '/assets/config/parameters.php';
//incluimos un archivo donde se encuentras funciones que se usaran en muchas partes de la app
require_once '/helpers/utils.php ';
//incluimos el header de la pagina
require 'views/layout/header.php';
//incluimos el menu lateral de la pagina
require 'views/layout/sidebard.php';

//creamos una funcion que accede al controlador y luego el metodo
function show_error(){

    $error = new errorController();
    $error->index();
}

//comprobamos si viene un controlador por get y asignamos a una variable
if(isset($_GET['controller'])){

    $nombre_controlador = $_GET['controller'].'controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){

    $nombre_controlador = controller_default;

}else{

    show_error();
    exit();
}

//comprobamos si el controlador tiene una clase y creamos el objeto
if(class_exists($nombre_controlador)){

    $contolador = new $nombre_controlador();
    
    //invocamos el metodo
    if(isset($_GET['action']) && method_exists($contolador, $_GET['action'])){

        $action = $_GET['action'];
        $contolador->$action();

    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){

        $action_default = action_default;
        $contolador->$action_default;

    }else{

        show_error();

    }

}else{

    show_error();
}

//incluimos el pie de pagina
require 'views/layout/footer.php';