<?php

class Database{
    //  ATRIBUTOS
    public $server, $user, $password, $database_name;

    //  CONSTRUCTOR
    public function __construct(){
        $this -> server = "localhost";
        $this -> user = "root";
        $this -> password = "";
        $this -> database_name = "gestor_objetivos";
    }

    //  METODOS
    public function connect(){
        if(isset($this -> server)){
            $server = $this -> server;
        }
        if(isset($this -> user)){
            $user = $this -> user;
        }
        if(isset($this -> password)){
            $password = $this -> password;
        }
        if(isset($this -> database_name)){
            $database_name = $this -> database_name;
        }

        if($this -> server !== null && $this -> user !== null && $this -> password !== null && $this -> database_name !== null){
            $db = mysqli_connect($server, $user, $password, $database_name);
            $db -> query("SET NAMES 'utf8'");
            return $db;
        }
        else{
            return false;
        }
 
    }

    //  GETTERS Y SETTERS


}