<?php
    require './casignatura.php';

    $info = new Casignatura($conexion);

    // Recibe los datos del formulario
    $asignatura = $_POST["asignatura"];
    $color = $_POST["color"];

    $info->insertarDatos($asignatura, $color); // Función que hace el proceso de insertar la fila
    $mensaje = $info->mensaje;

    echo '<p>' . $mensaje . '</p>';
    header("refresh:2 url=infoAsignaturas.php"); // Esperar 2 segundos antes de redirigir a infoAsignaturas.php
?>