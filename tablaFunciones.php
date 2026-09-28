<?php
    include 'configdb.php';
    // $colores = [];

    $fila = $resultado->fetch_array();
    echo '<p>' . $fila["idAsignatura"] . '. ' . $fila["nombre"] . ', ' . $fila["color"] . '</p>';

    // Mostrar segunda fila
    $fila = $resultado->fetch_array();
    echo '<p>' . $fila["idAsignatura"] . '. ' . $fila["nombre"] . ', ' . $fila["color"] . '</p>';

    /*while ($fila = $resultado->fetch_array()) {
        echo '<p>' . $fila["idAsignatura"] . '. ' . $fila["nombre"] . ', ' . $fila["color"] . '</p>';
        // $colores[$fila["nombre"]] = $fila["color"]; // Crear array de colores de asignaturas
        // Sintaxis: $colores[0] = "valor"
    }*/

    // Versión todo (Numérico, alfanumérico y colores) con funciones
    function Dias($horario) {
        foreach ($horario[1] as $dia => $contenido) { // Entra al array $horario[][$dia] = [$contenido]
            // Entra al índice 1, y $dia se refiere a "L", "M", etc..., mientras $contenido a ["IPP2", "DWENC", etc...]
            // Si fuera ($horario[1] as $dia), $dia se referiría a las asignaturas (valor), no al nombre asociativo ($horario[][$dia] = [x], no $horario[][x] = [$contenido])
            echo '<th>' . $dia . '</th>';
        }
    }

    function HorasAsignaturas($horario, $horas, $colores) {
        for ($i = 1; $i <= count($horario); $i++) {
            echo '<tr>'; // Una fila por cada hora
            echo '<td>' . $horas[$i-1] . '</td>'; // Saca el índice (hora)

            foreach ($horario[$i] as $dia => $asignatura) { // Accedo a la hora, dentro al día y va pasando por las asignaturas (misma explicación que el primer foreach)
            // Se podría hacer también como foreach ($horario[$i] as $asignatura) porque entra al valor directamente

                echo '<td style="background-color:' . $colores[$asignatura] . '">' . $asignatura . '</td>';
                // En $colores va al índice que equivalga $asignatura, mientras que $dia => $asignatura accede al array $horario["L" => "DWESV"]
                /* Ejemplo:
                    $horario[1]["J" => "DWESV"]
                    $colores["DWESV" => rgb(...)]

                    $horario[7]["L" => "DWENC"]
                    $colores["DWENC" => rgb(...)] (va al índice DWENC porque existe, igual que el valor DWENC en $horario el índice 7 en "L")
                */
            }
            echo '</tr>'; // Fin de fila
        }
    }

    // Horario[hora][dia] = asignatura
    $horario[1]["L"] = "IPP2";
    $horario[1]["M"] = "DWENC";
    $horario[1]["X"] = "IPP2";
    $horario[1]["J"] = "DWESV";
    $horario[1]["V"] = "OPT2I";

    $horario[2]["L"] = "DWESV";
    $horario[2]["M"] = "DWENC";
    $horario[2]["X"] = "DWENC";
    $horario[2]["J"] = "DWESV";
    $horario[2]["V"] = "OPT2A";

    $horario[3]["L"] = "DWESV";
    $horario[3]["M"] = "DWESV";
    $horario[3]["X"] = "DWENC";
    $horario[3]["J"] = "DWESV";
    $horario[3]["V"] = "DASP";

    $horario[4]["L"] = "PIMOD";
    $horario[4]["M"] = "DWESV";
    $horario[4]["X"] = "DWESV";
    $horario[4]["J"] = "SASP";
    $horario[4]["V"] = "DWESV";

    $horario[5]["L"] = "DEAPW";
    $horario[5]["M"] = "PIMOD";
    $horario[5]["X"] = "DEAPW";
    $horario[5]["J"] = "OPT1";
    $horario[5]["V"] = "DWESV";

    $horario[6]["L"] = "DWENC";
    $horario[6]["M"] = "DEAPW";
    $horario[6]["X"] = "DEAPW";
    $horario[6]["J"] = "IPP2";
    $horario[6]["V"] = "TUTO";

    $horario[7]["L"] = "DWENC";

    /* $colores [$indice1 => $valor1,
                $indice2 => $valor2,
                $indice3 => $valor3...
                ];*/
    $colores =  ["DWESV" => "#20b2aa",
                "DWENC" => "#fafad2",
                "DEAPW" => "#ffb6c1",
                "PIMOD" => "#b0c4de",
                "OPT2I" => "#d3d3d3",
                "OPT2A" => "#d3d3d3",
                "OPT1" => "#d3d3d3",
                "IPP2" => "#ffa07a",
                "DASP" => "#dda0dd",
                "SASP" => "#dda0dd",
                "TUTO" => "#ffffff"];

    $horas = ["8:15-9:10", "9:10-10:05", "10:05-11:00", "11:30-12:25", "12:25-13:20", "13:20-14:15", "14:15-15:00"];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
        <title>Horario Dinámico</title>
    </head>
    <body>
        <table>
            <?php
                /*print_r($horario);
                echo '<br/><br/>';
                print_r($colores);
                echo '<br/><br/>';
                print_r($horas);
                echo '<br/><br/>';*/

                echo '<tr>'; 
                echo '<th>Horas</th>';
                
                // Mostrar los días
                // Ejemplo de representación de la información que usa foreach:
                // $horario[1][
                //      "L"($dia) => "IPP2"($contenido), 
                //      "M"($dia) => "DWENC"($contenido), 
                //      "X"($dia) => "IPP2"($contenido), 
                //      "J"($dia) => "DWESV"($contenido), 
                //      "V"($dia) => "OPT2I"($contenido)
                //  ]
                // Mostrar los días
                Dias($horario);
                echo '</tr>';

                // Mostrar las horas y asignaturas
                HorasAsignaturas($horario, $horas, $colores);

                // Cuenta de filas
                echo 'Filas: ' . $resultado->num_rows;
            ?>
        </table>
    </body>
</html>