<?php
    require_once "./controllers/controllerObjetivos.php";
?>
<?php foreach($_SESSION['objetivos_de_hoy'] as $objetivo):?>
    <div class="objetivo">
        <div class="objetivo_header">
            <div><?=fecha_invertir(fecha_eliminar_hora($objetivo -> getFechaInicio()))?></div>
            <div><?=fecha_invertir($objetivo -> getFechaFin())?></div>
            <?php 
                $date1 = new DateTime(fecha_eliminar_hora($objetivo -> getFechaInicio()));
                $date2 = new DateTime($objetivo -> getFechaFin());
                $dias = ($date1->diff($date2)) -> d;
            ?>
            <div><?php ($dias > 1) ? print("Quedan ".$dias." días"): print("Queda ".$dias." día");?></div>
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