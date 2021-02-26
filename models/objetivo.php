<?php
require_once "./resources/db.php";

class Objetivo{
    //  ATRIBUTOS
    private $db, $cod, $cod_usuario, $cod_tarea, $fecha_inicio, $fecha_fin, $meta;

    //  CONSTRUCTOR Y DESTRUCTOR
    public function __construct(){
        $this -> db = (new Database()) -> connect();
    }

    public function __destruct(){
        $this -> db -> close();
    }

    //  METODOS
    public function guardar(){
        $sql = "INSERT INTO OBJETIVOS VALUES (
            NULL,
            '".$this -> cod_usuario."',
            '".$this -> cod_tarea."',
            '".$this -> fecha_inicio."',
            '".$this -> fecha_fin."',
            '".$this -> meta."',
            1
        )";

        $this -> db -> query($sql);
    }

    public function actualizar(){
        $sql = "UPDATE OBJETIVOS SET 
        CODUSU = '".$this -> cod_usuario."', 
        CODTAR = '".$this -> cod_tarea."', 
        FECINI = '".$this -> fecha_inicio."', 
        FECFIN = '".$this -> fecha_fin."', 
        META = '".$this -> meta."' 
        WHERE COD = ".$this -> cod;

        $this -> db -> query($sql);
    }

    public function eliminar(){
        $sql = "UPDATE OBJETIVOS SET ACTIVO = 0 WHERE COD = ".$this -> cod;

        $this -> db -> query($sql);
    }

    public function __toString(){
        return serialize($this);
    }

    public function serializar(){
        return serialize($this);
    }

    //  GETTERS
    public function getCod(){
        return $this -> cod;
    }

    public function getCodUsuario(){
        return $this -> cod_usuario;
    }
    
    public function getCodTarea(){
        return $this -> cod_tarea;
    }
    
    public function getFechaInicio(){
        return $this -> fecha_inicio;
    }
    
    public function getFechaFin(){
        return $this -> fecha_fin;
    }
    
    public function getMeta(){
        return $this -> meta;
    }

    //  SETTERS
    public function setCod($cod){
        $this -> cod = $cod;
    }

    public function setCodUsuario($cod_usuario){
        $this -> cod_usuario = $cod_usuario;
    }
    
    public function setCodTarea($cod_tarea){
        $this -> cod_tarea = $cod_tarea;
    }
    
    public function setFechaInicio($fecha_inicio){
        $this -> fecha_inicio = $fecha_inicio;
    }
    
    public function setFechaFin($fecha_fin){
        $this -> fecha_fin = $fecha_fin;
    }
    
    public function setMeta($meta){
        $this -> meta = $this -> db -> real_escape_string($meta);
    }

}