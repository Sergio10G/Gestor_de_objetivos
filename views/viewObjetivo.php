<?php
    if(isset($_GET['cod'])){
        $cod = $_GET['cod'];
    }
    else{
        $cod = 1;
    }

    if(isset($_GET['tarea'])){
        $tarea = $_GET['tarea'];
    }
    else{
        $tarea = "";
    }

    if(isset($_GET['fecha_inicio'])){
        $fecha_inicio = $_GET['fecha_inicio'];
    }
    else{
        $fecha_inicio = "";
    }

    if(isset($_GET['fecha_fin'])){
        $fecha_fin = $_GET['fecha_fin'];
    }
    else{
        $fecha_fin = "";
    }

    if(isset($_GET['meta'])){
        $meta = $_GET['meta'];
    }
    else{
        $meta = "";
    }

?>
<div class="objetivo">
    <div class="objetivo_header">
        <div><?=$fecha_inicio?></div>
        <div><?=$fecha_fin?></div>
        <div>Quedan x días</div>
    </div>
    <div class="objetivo_cuerpo">
        <div class="objetivo_titulo">
            <?=$tarea?>
        </div>
        <div class="objetivo_descripcion">
            <?=$meta?>
        </div>
    </div>
    <div class="objetivo_footer">
        <form action="HAYQUERELLENARESTO" method="post">
            <div><input type="submit" name="objetivo_submit" value="inc-<?=$cod?>"></div>
            <div><input type="submit" name="objetivo_submit" value="act-<?=$cod?>"></div>
            <div><input type="submit" name="objetivo_submit" value="cum-<?=$cod?>"></div>
        </form>
    </div>
</div>