<?php

class Categoria{
    private $id_categoria; 
    private $nombre;
 
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

      //Getters
      function getId_categoria() {
        return $this->id_categoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    //Setters
    function setId_categoria($id_categoria){
        $this->id_categoria=$id_categoria;
    }

    function setNombre($nombre){
        $this->nombre= $this->db->real_escape_string($this->$nombre);
    }

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id_categoria DESC");

        return $categorias;

    }

    public function save(){
        
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>