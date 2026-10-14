<?php
    include './casignatura.php';

    $info = new Casignatura($conexion);

    $idMod = $_GET["id"]; // Se recibe a través del form con .php=id=... como el <a>
    $nombre = $_POST["nombre"];
    $color = $_POST["color"];

    $info->modificarFila($idMod, $nombre, $color); // Función que hace el proceso de modificar los datos
    
    $mensaje = $info->mensaje;

    echo '<p>' . $mensaje . '</p>';
    header("refresh:2 url=infoAsignaturas.php"); // Esperar 2 segundos antes de redirigir a infoAsignaturas.php
?>