<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de objetivos</title>
    
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="contenedor">
        <header>
            <h1>Gestor de objetivos</h1>
            
            <nav>
                <a href="../index.php" id="opcion1">
                    <div class="opcion_nav">Inicio</div>
                </a>
                <a href="#" id="opcion2">
                    <div class="opcion_nav">Agenda</div>
                </a>
                <a href="#" id="opcion3">
                    <div class="opcion_nav">Tareas</div>
                </a>
                <a href="#" id="opcion4">
                    <div class="opcion_nav">Recompensas</div>
                </a>
            </nav>
        </header>

        <div id="contenido">
            <section>
                <?php
                    include "../php/query.php";
                    include "../php/recursos.php";
                    
                    //  $fecha = date("Y-m-d");
                    
                    $tareas = query_tareas();

                    $mod = "";
                    for ($i=0; $i < count($tareas); $i++) {
                        if ($i == 0) {
                            $mod = "margin-top: 3%; ";
                        }
                        else{
                            $mod = "";
                        }
                        echo 
                        '
                            <div class="tarjeta_tarea" style="'.$mod.';">
                                <div class="info_tarea">
                                    <div class="info_tarea_nums">
                                        <div class="fechas">
                                            <h6>'.invertir_fecha($tareas[$i] -> fecha_inicio).'</h6>
                                            <h6>'.invertir_fecha($tareas[$i] -> fecha_fin).'</h6>
                                        </div>
                                        <div class="tipo">

                                        </div>
                                        <div class="puntos">
                                            
                                        </div>
                                    </div>
                                    <div class="info_tarea_texto">
                                        <h2>'.$tareas[$i] -> descripcion.'</h2>
                                        <p>'.$tareas[$i] -> meta.'.</p>
                                    </div>
                                    
                                </div>

                                <div class="botones_tarea">
                                    <form method="post" action="../php/accion_tarea.php">
                                        <button type="submit" name="btn" value="'.$i.'-Eliminar" class="boton_tarea" id="boton1">Eliminar</button>
                                        <button type="submit" name="btn" value="'.$i.'-Incumplido"  class="boton_tarea" id="boton2">Incumplido</button>
                                        <button type="submit" name="btn" value="'.$i.'-Cumplido"  class="boton_tarea" id="boton3">Cumplido</button>
                                    </form>
                                </div>
                            </div>
                        ';
                    }
                    
                ?>
            </section>

            <aside>
                <?php 
                    foreach ($tareas as $tarea) {
                        foreach (get_object_vars($tarea) as $key => $value) {
                            echo "$key: $value<br>";
                        }
                        echo "<hr>";
                    }
                ?>
            </aside>
        </div>

        <footer>

        </footer>
    </div>
    
</body>
</html>