<?php

class Database{
    //  ATRIBUTOS
    private $server, $user, $password, $database_name;

    //  CONSTRUCTOR
    public function __construct(){
        $this -> server = "localhost";
        $this -> user = "root";
        $this -> password = "";
        $this -> database_name = "GESTOR_OBJETIVOS";
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

    //  GETTERS
    public function getServer(){
        return $this -> server;
    }

    public function getUser(){
        return $this -> user;
    }

    public function getPassword(){
        return $this -> password;
    }

    public function getDatabaseName(){
        return $this -> database_name;
    }

    //  SETTERS
    public function setServer($server){
        $this -> server = $server;
    }

    public function setUser($user){
        $this -> server = $user;
    }

    public function setPassword($password){
        $this -> password = $password;
    }

    public function setDatabaseName($database_name){
        $this -> database_name = $database_name;
    }
}