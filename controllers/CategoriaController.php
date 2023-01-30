<?php

require_once 'models/categoria.php';

class categoriaController{

    public function index(){

        Utils::isAdmid();

        $categoria = new Categoria;

        $categorias = $categoria->getAll();

        require_once './views/categoria/index.php'; 

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