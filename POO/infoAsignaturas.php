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
                        // $accion dentro del foreach para coger el ID de cada asignatura
                        $accion = [
                            "id" => $asignatura["idAsignatura"], // ID de la asignatura
                            0 => "m", // Modificar
                            1 => "e" // Eliminar
                        ];

                        echo '<tr>';
                        echo '<td>' . $asignatura["nombre"] . '</td>';
                        echo '<td style="background-color: ' . $asignatura["color"] . ';">' . $asignatura["color"] . '</td>';
                        echo '<td>';

                        // Mandar ID por GET a la página modificar e índice 0 para "m" (Modificar)
                        echo '<a href="control.php?id=' . $accion["id"] . '&action=' . $accion[0] . '">M</a>';

                        // Mandar ID por GET a la página eliminar e índice 1 para "e" (Eliminar)
                        echo '<a href="control.php?id=' . $accion["id"] . '&action=' . $accion[1] . '">E</a>';

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