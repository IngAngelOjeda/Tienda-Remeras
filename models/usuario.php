<?php

class Usuario{
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $rol;
    private $email;
    private $password;
    private $image;
    private $fecha;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //Getters
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getRol() {
        return $this->rol;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getImage() {
        return $this->image;
    }

    function getFecha() {
        return $this->fecha;
    }

    //Setters
    function setId_usuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }

    function setNombre($nombre){
        $this->nombre= $this->db->real_escape_string($this->$nombre);
    }

    function setApellido($apellido){
        $this->apellido= $this->db->real_escape_string($this->$apellido);
    }

    function setRol($rol){
        $this->rol=$rol;
    }

    function setEmail($email){
        $this->email= $this->db->real_escape_string($this->$email);
    }

    function setPassword($password){
        $this->password=$this->db->real_escape_string($password, PASSWORD_BCRYPT, ['cost'=> 4] );
    }

    function setImagen($image){
        $this->image=$image;
    }

    function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}',  'user', '{$this->getEmail()}', '{$this->getPassword()}', 'NULL', NOW())";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;

    }
}


