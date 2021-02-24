<?php

function fecha_eliminar_hora($fecha_con_hora){
    return explode(" ", $fecha_con_hora)[0];
}

function fecha_invertir($fecha){
    $partes = explode("-", $fecha);
    return $partes[2]."-".$partes[1]."-".$partes[0];
}