<?php
require_once "../resources/db.php";

class Tarea{
    //  ATRIBUTOS
    private $db, $cod, $descripcion, $puntos, $tipo;

    //  CONSTRUCTOR Y DESTRUCTOR
    public function __construct(){
        $this -> db = (new Database()) -> connect();
    }

    public function __destruct(){
        $this -> db -> close();
    }

    //  METODOS
    public function guardar(){
        $sql = "INSERT INTO TAREAS VALUES (
            NULL,
            '".$this -> descripcion."',
            '".$this -> puntos."',
            '".$this -> tipo."',
        )";

        $this -> db -> query($sql);
    }

    public function actualizar(){
        $sql = "UPDATE TAREAS SET
        DESCRIP = '".$this -> descripcion."',
        PUNTOS = '".$this -> puntos."',
        TIPO = '".$this -> tipo."',
        WHERE COD = ".$this -> cod;

        $this -> db -> query($sql);
    }

    public function eliminar(){
        $sql = "DELETE FROM TAREAS WHERE COD = ".$this -> cod;

        $this -> db -> query($sql);
    }

    //  GETTERS
    public function getCod(){
        return $this -> cod;    
    }

    public function getDescripcion(){
        return $this -> descripcion;    
    }

    public function getPuntos(){
        return $this -> puntos;    
    }

    public function getTipo(){
        return $this -> tipo;    
    }

    //  SETTERS
    public function setDescripcion($descripcion){
        $this -> descripcion = $this -> db -> real_escape_string($descripcion);    
    }

    public function setPuntos($puntos){
        $this -> puntos = $puntos;    
    }

    public function setTipo($tipo){
        $this -> tipo = $tipo;    
    }

}