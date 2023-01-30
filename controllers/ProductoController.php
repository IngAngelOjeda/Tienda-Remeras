<?php

require_once 'models/producto.php';

class productoController{

    public function index(){

        require_once './views/layout/producto/destacados.php';

    }

    public function gestion(){

        Utils::isAdmid();

        $producto = new Producto;
        $producto = $producto->getAll();

        require_once 'views/producto/gestion.php';

    }

    public function crear(){

        Utils::isAdmid();

        require_once 'views/producto/crear.php';
    }

    public function save(){

        Utils::isAdmid();

        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){

                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setId_categoria($categoria);
                // $producto->setNombre($imagen);

                $producto->save()
                
            }
        }

        
    }
}