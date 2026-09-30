<?php
    // Versión hora y día asociativos
    $horario["8:15-9:10"]["L"] = "IPP2";
    $horario["8:15-9:10"]["M"] = "DWENC";
    $horario["8:15-9:10"]["X"] = "IPP2";
    $horario["8:15-9:10"]["J"] = "DWESV";
    $horario["8:15-9:10"]["V"] = "OPT2I";

    $horario["9:10-10:05"]["L"] = "DWESV";
    $horario["9:10-10:05"]["M"] = "DWENC";
    $horario["9:10-10:05"]["X"] = "DWENC";
    $horario["9:10-10:05"]["J"] = "DWESV";
    $horario["9:10-10:05"]["V"] = "OPT2A";

    $horario["10:05-11:00"]["L"] = "DWESV";
    $horario["10:05-11:00"]["M"] = "DWESV";
    $horario["10:05-11:00"]["X"] = "DWENC";
    $horario["10:05-11:00"]["J"] = "DWESV";
    $horario["10:05-11:00"]["V"] = "DASP";

    $horario["11:30-12:25"]["L"] = "PIMOD";
    $horario["11:30-12:25"]["M"] = "DWESV";
    $horario["11:30-12:25"]["X"] = "DWESV";
    $horario["11:30-12:25"]["J"] = "SASP";
    $horario["11:30-12:25"]["V"] = "DWESV";

    $horario["12:25-13:20"]["L"] = "DEAPW";
    $horario["12:25-13:20"]["M"] = "PIMOD";
    $horario["12:25-13:20"]["X"] = "DEAPW";
    $horario["12:25-13:20"]["J"] = "OPT1";
    $horario["12:25-13:20"]["V"] = "DWESV";

    $horario["13:20-14:15"]["L"] = "DWENC";
    $horario["13:20-14:15"]["M"] = "DEAPW";
    $horario["13:20-14:15"]["X"] = "DEAPW";
    $horario["13:20-14:15"]["J"] = "IPP2";
    $horario["13:20-14:15"]["V"] = "TUTO";

    $horario["14:15-15:00"]["L"] = "DWENC";
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
            print_r($horario);
            echo '<br/><br/>';

            echo '<tr>'; 
            echo '<td></td>'; // ¿Cómo podría colocarse bien sin este espacio en blanco?
            
            // Mostrar los días
            // Ejemplo de representación de la información que usa foreach:
            // $horario["8:15-9:10"][
            //      "L"($dia) => "IPP2"($contenido), 
            //      "M"($dia) => "DWENC"($contenido), 
            //      "X"($dia) => "IPP2"($contenido), 
            //      "J"($dia) => "DWESV"($contenido), 
            //      "V"($dia) => "OPT2I"($contenido)
            //  ]
            foreach ($horario["8:15-9:10"] as $dia => $contenido) { // Entra al array $horario[][$dia] = [$contenido]
                // Entra al índice "8:15-9:10", y $dia se refiere a "L", "M", etc..., mientras $contenido a ["IPP2", "DWENC", etc...]
                // Si fuera ($horario["8:15-9:10"] as $dia), $dia se referiría a las asignaturas (valor), no al nombre asociativo ($horario[][$dia] = [x], no $horario[][x] = [$contenido])
                echo '<th>' . $dia . '</th>';
            }
            echo '</tr>';

            // Mostrar las horas y asignaturas
            // Ejemplo de representación de la información que usa foreach: $horario[$hora][] = [$contenido]
            foreach ($horario as $hora => $contenido) { // Entra al array $horario[$hora][] = [$contenido]
                echo '<tr>'; // Por cada [x][] se hace una fila (por cada hora)
                echo '<td>' . $hora . '</td>'; // Muestra el nombre asociativo (índice) de las horas $horario[x][] = [$contenido]

                // Ejemplo de representación de la información que usa foreach =  $horario[$hora][$dia] = ["IPP2"($asignatura), "DWENC", "IPP2", "DWESV", "OPT2I"]($contenido)
                foreach ($contenido as $dia => $asignatura) { // Entra al contenido del array $horario[$hora][$dia] = ["L"($dia) => "IPP2"($asignatura), "M"($dia) => "DWENC"($asignatura), ...] ($contenido)
                    echo '<td>' . $asignatura . "</td>"; // Una celda por cada asignatura
                }
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>