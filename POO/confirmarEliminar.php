<?php
    require 'casignatura.php';

    $info = new Casignatura($conexion);
    $id = $_GET["id"]; // <a> manda los datos por GET y lo recibe el .php
    $asignatura = $info->obtenerAsignatura($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar asignatura</title>
</head>
<body>
    <h1>Eliminar asignatura</h1>
    <?php
        echo '<p>¿Estás seguro de que quieres eliminar la asignatura ' . $asignatura["nombre"] . '?</p>';
        echo '<a href="eliminar.php?id=' . $id . '">Si</a>';
    ?>
    <a href="infoAsignaturas.php">No</a>
</body>
</html>