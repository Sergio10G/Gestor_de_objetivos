<?php
    include "./query.php";
    if(isset($_POST['btn'])){
        $arr_opcion = explode("-", $_POST['btn']);
        $cod = $arr_opcion[0];
        $accion = $arr_opcion[1];
    }
    else{
        $cod = null;
        $accion = null;
    }
?>

<?php 
    switch($accion){
        case "Eliminar":
            $query = "UPDATE OBJETIVOS SET ACTIVO = 0 WHERE COD = $cod";
            mysqli_query($link, $query);
            break;
        case "Cumplido":
            break;
        case "Incumplido":
            break;
        default:
            break;
    }
    if($cod !== null){
        echo "<h1>Query realizada</h1>";
    }
?>

<?php 
    header("Refresh:3; url=../pages/agenda.php");
?>