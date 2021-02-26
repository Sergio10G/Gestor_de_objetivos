<?php
    require_once "./resources/db.php";
    require_once "./models/objetivo.php";
    
    if(count($_SESSION['objetivos_de_hoy']) == 0 && !$_SESSION['dia_sin_objetivos']){
        $_SESSION['objetivos_de_hoy'] = [];

        $db = (new Database()) -> connect();
        $hoy = (int) date("Y").date("m").date("d");
        $consulta_objetivos_fecha =     "SELECT * FROM OBJETIVOS 
                                        WHERE ACTIVO = 1 AND 
                                        CAST(CONCAT(SUBSTRING(FECINI, 1, 4), SUBSTRING(FECINI, 6, 2), SUBSTRING(FECINI, 9, 2)) AS INTEGER) <= $hoy and
                                        CAST(CONCAT(SUBSTRING(FECFIN, 1, 4), SUBSTRING(FECFIN, 6, 2), SUBSTRING(FECFIN, 9, 2)) AS INTEGER) >= $hoy";
    
        if($resultado_objetivos_fecha = $db -> query($consulta_objetivos_fecha)){
            while($registro_devuelto = mysqli_fetch_assoc($resultado_objetivos_fecha)){;
                $objetivo = new Objetivo();
                $objetivo -> setCod($registro_devuelto['COD']);
                $objetivo -> setCodUsuario($registro_devuelto['CODUSU']);
                $objetivo -> setCodTarea($registro_devuelto['CODTAR']);
                $objetivo -> setFechaInicio($registro_devuelto['FECINI']);
                $objetivo -> setFechaFin($registro_devuelto['FECFIN']);
                $objetivo -> setMeta($registro_devuelto['META']);
    
                array_push($_SESSION['objetivos_de_hoy'], $objetivo);
            }
        }
        
        if(count($_SESSION['objetivos_de_hoy']) == 0){
            $_SESSION['dia_sin_objetivos'] = true;
        }

        $resultado_objetivos_fecha -> free();
        $db -> close();
    }
    else{
        echo "<h1>Error en ControllerObjetivos</h1>";
    }