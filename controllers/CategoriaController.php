<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{

    public function index(){

        Utils::isAdmid();

        $categoria = new Categoria;

        $categorias = $categoria->getAll();

        require_once './views/categoria/index.php'; 

    }

    public function ver(){

        if(isset($_GET['id_categoria'])){
            // Conseguir categoria
            $id_categoria = $_GET['id_categoria'];
            $categoria = new Categoria();
            $categoria->setId_categoria($id_categoria);
            $categoria = $categoria->getOne();
            // Conseguir producto

            $producto = new Producto();
            $producto->setId_categoria($id_categoria);
            $productos = $producto->getAllCategory();

        }

        require_once 'views/categoria/ver.php';

    }

    public function crear(){

        Utils::isAdmid();

        require_once 'views/categoria/crear.php';
    }

    public function save(){

        Utils::isAdmid();
        //Guardar categoria
        if(isset($_POST) && isset($_POST['nombre'])){

            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save=$categoria->save();

        }

        header("Location:".base_url."categoria/index");

    }

}