<?php
    // Versión hora número, día asociativo
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

            /*foreach ($horario[1] as $dia => $contenido) { // Entra al array $horario[][$dia] = [$contenido]
                // Entra al índice 1, y $dia se refiere a "L", "M", etc..., mientras $contenido a ["IPP2", "DWENC", etc...]
                // Si fuera ($horario[1] as $dia), $dia se referiría a las asignaturas (valor), no al nombre asociativo ($horario[][$dia] = [x], no $horario[][x] = [$contenido])
                echo '<th>' . $dia . '</th>';
            }
            echo '</tr>'; // Cierre para th*/

            // Mostrar las horas y asignaturas
            for ($i = 1; $i <= count($horario); $i++) {
                echo '<tr>';
                echo '<td>' . $i . '</td>'; // Saca las horas
            }

            foreach ($horario as $hora => $contenido) {
                foreach ($contenido as $dia => $asignatura) {
                    echo '<td>' . $asignatura . '</td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>