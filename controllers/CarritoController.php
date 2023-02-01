<?php

require_once 'models/producto.php';

class carritoController{

    public function index(){

        echo 'Controlador Carrito, Accion index';

    }

    public function add(){

        if(isset($_GET['id_producto'])){

            $id_producto = $_GET['id_producto'];

        }else{

            header("Location:".base_url);

        }

        if(isset($_SESSION['carrito'])){

        }else{
            //Obtenemos el producto
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto =  $producto->getOne();

            if(is_object($producto)){
                
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id_producto,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" =>$producto
                );

            }

        }

        header("Location:".base_url."carrito/index");

    }

    public function remove(){
        
    }

    public function delete_all(){
        
        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");

    }

}