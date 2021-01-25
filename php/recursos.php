<?php

    //  Clases

    class tarea{
        public $cod, $tipo, $descripcion, $meta, $puntos, $fecha_inicio, $fecha_fin;

        function __construct($array_datos)
        {
            $this -> cod = $array_datos['COD'];
            $this -> tipo = $array_datos['TIPO'];
            $this -> descripcion = $array_datos['DESCRIP'];
            $this -> meta = $array_datos['META'];
            $this -> puntos = $array_datos['PUNTOS'];
            $this -> fecha_inicio = fecha_usable($array_datos['FECINI']);
            $this -> fecha_fin = fecha_usable($array_datos['FECFIN']);

        }

        function eliminar_tarea($link){
            mysqli_query($link, "UPDATE OBJETIVOS SET ACTIVO = 0 WHERE OBJETIVOS.COD = ".$this -> cod) or die("<h1>ELIMINAR: No se ha podido conectar con la base de datos.</h1>");
        }

        function tarea_cumplida($link){
            mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
            mysqli_query($link, "INSERT INTO TRANSACCIONES(REF_OBJETIVO, FECHA, CUMPLIDO) VALUES (".$this -> cod.", ".date("Y-m-d").", TRUE)") or die("<h1>CUMPLIDO_TRANSACCON: No se ha podido conectar con la base de datos.</h1>");
            mysqli_query($link, "UPDATE OBJETIVOS SET ACTIVO = 0 WHERE OBJETIVOS.COD = ".$this -> cod) or die("<h1>CUMPLIDO_ACTUALIZACION: No se ha podido conectar con la base de datos.</h1>");
            mysqli_commit($link);
        }

        function tarea_incumplida($link){
            mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
            mysqli_query($link, "INSERT INTO TRANSACCIONES(REF_OBJETIVO, FECHA, CUMPLIDO) VALUES (".$this -> cod.", ".date("Y-m-d").", FALSE)") or die("<h1>INCUMPLIDO_TRANSACCON: No se ha podido conectar con la base de datos.</h1>");
            mysqli_query($link, "UPDATE OBJETIVOS SET ACTIVO = 0 WHERE OBJETIVOS.COD = ".$this -> cod) or die("<h1>INCUMPLIDO_ACTUALIZACION: No se ha podido conectar con la base de datos.</h1>");
            mysqli_commit($link);
        }
    }

    //  Funciones

    function fecha_usable($fecha){
        $array_fecha = explode(" ", $fecha);
        $fecha_usable = "";
        if(count($array_fecha) > 1){
            $fecha_usable = $array_fecha[0];
        }
        else{
            $fecha_usable = $fecha;
        }
        return $fecha_usable;
    }

    function invertir_fecha($fecha){
        $fecha = fecha_usable($fecha);
        $array_fecha = explode("-", $fecha);
        $fecha_invertida = "";
        for($i = count($array_fecha) - 1; $i >= 0 ; $i--){
            if($i == 0){
                $str = $array_fecha[$i];
            }
            else{
                $str = $array_fecha[$i]."-";
            }
            $fecha_invertida = $fecha_invertida.$str;
        }
        return $fecha_invertida;
    }
?>