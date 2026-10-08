<?php
    require './casignatura.php';

    $info = new Casignatura($conexion);
    $asignaturas = $info->obtenerDatos(); // Traer filas de la BD al array
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Asignaturas</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>TABLA DE ASIGNATURAS / COLOR</h1>
        <table>
            <tr>
                <th>ASIGNATURA</th>
                <th>COLOR</th>
                <th>PROCESO</th>
            </tr>
            <?php
                // Mandar las asignaturas (array) a la función para mostrar la tabla
                $info->listarAsignaturas($asignaturas);
            ?>
        </table>
        <a href="./formularioInsertar.html">Añadir</a>
    </body>
</html>