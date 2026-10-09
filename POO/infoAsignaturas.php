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
                if (isset($asignaturas)) {
                    foreach ($asignaturas as $asignatura) {
                        echo '<tr>';
                        echo '<td>' . $asignatura["nombre"] . '</td>';
                        echo '<td style="background-color: ' . $asignatura["color"] . ';">' . $asignatura["color"] . '</td>';
                        echo '<td>';

                        // Mandar ID por GET a la página modificar
                        echo '<a href="formularioModificar.php?id=' . $asignatura["idAsignatura"] . '">M</a>';

                        // Mandar ID por GET a la página eliminar
                        echo '<a href="confirmarEliminar.php?id=' . $asignatura["idAsignatura"] . '">E</a>';

                        echo '</td>';
                        echo '</tr>';
                    }
                }

                else {
                    echo '<p>No hay asignaturas</p>';
                }
            ?>
        </table>
        <a href="./formularioInsertar.html">Añadir</a>
    </body>
</html>