<?php
    require_once "./resources/db.php";
    require_once "./models/objetivo.php";

    $db = (new Database()) -> connect();
    $hoy = date("Y-m-d");

    $objetivos_de_hoy = [];

    $consulta_objetivos_fecha = "SELECT * FROM OBJETIVOS WHERE ACTIVO = 1 AND FECINI <= $hoy";

    if($resultado_objetivos_fecha = $db -> query($consulta_objetivos_fecha)){
        while($registro_devuelto = mysqli_fetch_assoc($resultado_objetivos_fecha)){
            $objetivo = new Objetivo();
            $objetivo -> setCod($registro_devuelto['COD']);
            $objetivo -> setCodUsuario($registro_devuelto['CODUSU']);
            $objetivo -> setCodTarea($registro_devuelto['CODTAR']);
            $objetivo -> setFechaInicio($registro_devuelto['FECINI']);
            $objetivo -> setFechaFin($registro_devuelto['FECFIN']);
            $objetivo -> setMeta($registro_devuelto['META']);

            array_push($objetivos_de_hoy, $objetivo);
        }
    }
    
    $resultado_objetivos_fecha -> free();
    $db -> close();