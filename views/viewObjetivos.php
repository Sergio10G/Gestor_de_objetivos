<?php
    require_once "./resources/helpers.php";
    require_once "./controllers/controllerObjetivos.php";
    
    //echo "<h1>Hola</h1>";
    //echo var_dump($_SESSION['objetivos_de_hoy']);
?>
<?php foreach($_SESSION['objetivos_de_hoy'] as $objetivo):?>
    <div class="objetivo">
        <div class="objetivo_header">
            <div><?=fecha_invertir(fecha_eliminar_hora($objetivo -> getFechaInicio()))?></div>
            <div><?=fecha_invertir($objetivo -> getFechaFin())?></div>
            <div>Quedan x días</div>
        </div>
        <div class="objetivo_body">
            <div class="objetivo_titulo">
                Tarea
            </div>
            <div class="objetivo_descripcion">
                <?=$objetivo -> getMeta()?>
            </div>
        </div>
        <form action="#" method="post">
            <div class="objetivo_footer">
                <div><button name="objetivo_submit" value="inc-<?=$objetivo -> getCod()?>">Incumplido</button></div>
                <div><button name="objetivo_submit" value="mod-<?=$objetivo -> getCod()?>">Modificar</button></div>
                <div><button name="objetivo_submit" value="cum-<?=$objetivo -> getCod()?>">Cumplido</button></div>
            </div>
        </form>
    </div>
<?php endforeach;?>