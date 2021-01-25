<?php
    //  DEFINICIÓN DE FUNCIONES

    function hacer_query($str_query){
        global $link;
        $resultados = [];

        if($res = mysqli_query($link, $str_query)){
            while($registro = mysqli_fetch_array($res)){
                array_push($resultados, $registro);
            }
        }
        else{
            echo "No se ha podido hacer la query.";
        }

        return $resultados;
    }

    function query_tareas(){
        $str_query = "SELECT OBJETIVOS.COD, TIPO, DESCRIP, META, PUNTOS, FECINI, FECFIN 
                    FROM OBJETIVOS  INNER JOIN USUARIOS  ON OBJETIVOS.CODUSU = USUARIOS.COD
                                    INNER JOIN TAREAS    ON OBJETIVOS.CODTAR = TAREAS.COD
                    WHERE ACTIVO = 1 AND NOMBRE = 'SERGIO'";
        $tareas = [];
        $resultados_query = hacer_query($str_query);
        foreach($resultados_query as $registro){
            array_push($tareas, new tarea($registro));
        }
        return $tareas;
    }

    //  CONEXIÓN A LA BASE DE DATOS

    $user = "root";
    $pass = "";
    $server = "localhost";
    $db = "GESTOR_OBJETIVOS";

    $link = mysqli_connect($server, $user, $pass, $db) or die("No se ha podido conectar con la base de datos.");
?>