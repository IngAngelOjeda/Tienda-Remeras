<?php

class Producto{
    private $id_producto;
    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;
    private $fecha;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //Getters
    function getId_producto() {
        return $this->id_producto;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getFecha() {
        return $this->fecha;
    }

    //Setters
    function setId_producto($id_producto){
        $this->id_producto=$id_producto;
    }

    function setId_categoria($id_categoria){
        $this->id_categoria=$id_categoria;
    }

    function setNombre($nombre){
        $this->nombre= $this->db->real_escape_string($this->$nombre);
    }

    function setDescripcion($descripcion){
        $this->descripcion= $this->db->real_escape_string($this->$descripcion);
    }

    function setPrecio($precio){
        $this->precio= $this->db->real_escape_string($this->$precio);
    }

    function setStock($stock){
        $this->stock= $this->db->real_escape_string($this->$stock);
    }

    function setImagen($imagen){
        $this->imagen= $imagen;
    }

    function setOferta($oferta){
        $this->oferta=$this->db->real_escape_string($oferta);
    }

    function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function getAll(){

        $productos = $this->db->query("SELECT * FROM productos ORDER BY id_producto DESC");

        return $productos;

    }

    public function getOne(){

        $producto = $this->db->query("SELECT * FROM productos WHERE id_producto = {$this->getId_producto()} ORDER BY id_producto DESC");

        return $producto->fetch_object();

    }

    public function edit(){
        $sql = "UPDATE  productos SET nombre = '{$this->getNombre()}' ,id_categoria = '{$this->getId_categoria()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}, oferta = '{$this->getOferta()}' "


        $sql .= ", imagen = '{$this->getImagen()}', NOW() ";
        
        
        $save = $this->db->query($sql);

        $result = false;

        if($save){

            $result = true;

        }

        return $result;

    }

    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getId_categoria()}' , '{$this->getNombre()}', '{$this->getDescripcion()}',  'user', {$this->getPrecio()}, {$this->getStock()}, '{$this->getOferta()}', '{$this->getImagen()}', NOW())";
        $save = $this->db->query($sql);

        // depurar
        // echo $sql;
        // echo "</br>";
        // echo $this->db->error;
        // die();

        $result = false;

        if($save){

            $result = true;

        }

        return $result;

    }

    public function delete(){

        $sql = "DELETE FROM productos WHERE id_producto = {$this->id_producto}";

        $delete = $this->db->query($sql);

        $result = false;

        if($delete){

            $result = true;

        }

        return $result;
        
    }
    

}