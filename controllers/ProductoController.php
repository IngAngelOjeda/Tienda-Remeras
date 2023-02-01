<?php

require_once 'models/producto.php';

class productoController{
    
    public function index(){

        $producto = new Producto();
        $producto->getRandom(6);

        require_once './views/producto/destacados.php';

    }

    public function ver(){

        if(isset($_GET['id_producto'])){

            $producto = new Producto;

            $producto->setId_producto($_GET['id_producto']);

            $pro= $producto->getOne();

        }
        
        require_once 'views/producto/ver.php';

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
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){

                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setId_categoria($categoria);
                // $producto->setImagen($imagen);
                
                //Guardar imagen
                if(isset($_FILES['imagen'])){

                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                        $_SESSION['producto'] = "failed";

                    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/git'){

                        if(!is_dir('uploads/images')){

                            mkdir('uploads', 0777, true);

                        }

                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);

                        $producto->setImagen($filename);

                    }

                }

                if(isset($_GET['id_producto'])){
                    $id_producto = ($_GET['id_producto']);
                    $producto->setId_producto($id_producto);
                    $save = $producto->edit();

                }else{

                    $save = $producto->save();

                }

                if($save){

                    $_SESSION['producto']= "complete";

                }else{

                    $_SESSION['producto'] = "failed";

                }
   
            }else{

                $_SESSION['producto'] = "failed";

            }

        }else{

            $_SESSION['producto'] = "failed";

        }

        header("Location:".base_url.'producto/gestion');
        
    }


    public function editar(){
        
        Utils::isAdmid();

        if(isset($_GET['id_producto'])){

            $edit = true;

            $producto = new Producto;

            $producto->setId_producto($_GET['id_producto']);

            $pro= $producto->getOne();

            require_once 'views/producto/crear.php';


        }else{

            header('Location:'.base_url.'producto/gestion');

        }

    }

    public function eliminar(){

        Utils::isAdmid();

        if(isset($_GET['id_producto'])){

            $id_producto = $_GET['id_producto'];

            $producto= new Producto;

            $producto->setId_producto($id_producto);

            $delete =  $producto->delete();

            if($delete){

                $_SESSION['delete'] = 'complete';

            }else{

                $_SESSION['delete'] ='failed';

            }

        }else{

            $_SESSION['delete'] ='failed';

        }

        header('Location:'.base_url.'producto/gestion');

    }

}