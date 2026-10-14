<?php
    require 'casignatura.php';

    $info = new Casignatura($conexion);

    $id = $_GET["id"];
    $info->eliminarAsignatura($id);
    $mensaje = $info->mensaje;
    
    echo '<p>' . $mensaje . '</p>';
    header("refresh:2 url=infoAsignaturas.php"); // Esperar 2 segundos antes de redirigir a infoAsignaturas.php
?>