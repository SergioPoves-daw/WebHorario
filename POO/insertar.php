<?php
    require './casignatura.php';

    // Recibe los datos del formulario
    $asignatura = $_POST["asignatura"];
    $color = $_POST["color"];
    $bd = new Casignatura($conexion);

    $bd->insertarDatos($asignatura, $color); // Función que hace el proceso de insertar la fila
?>