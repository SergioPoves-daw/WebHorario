<?php
    // Versión hora número, día asociativo y colores dinámicos
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
    $colores =  ["DWESV" => "rgb(32, 178, 170)",
                "DWENC" => "rgb(250, 250, 210)",
                "DEAPW" => "rgb(255, 182, 193)",
                "PIMOD" => "rgb(176, 196, 222)",
                "OPT2I" => "rgb(211, 211, 211)",
                "OPT2A" => "rgb(211, 211, 211)",
                "OPT1" => "rgb(211, 211, 211)",
                "IPP2" => "rgb(255, 160, 122)",
                "DASP" => "rgb(221, 160, 221)",
                "SASP" => "rgb(221, 160, 221)",
                "TUTO" => "rgb(0, 0, 0, 0.1)"];
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
                print_r($colores);
                echo '<br/><br/>';

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

                foreach ($horario[1] as $dia => $contenido) { // Entra al array $horario[][$dia] = [$contenido]
                    // Entra al índice 1, y $dia se refiere a "L", "M", etc..., mientras $contenido a ["IPP2", "DWENC", etc...]
                    // Si fuera ($horario[1] as $dia), $dia se referiría a las asignaturas (valor), no al nombre asociativo ($horario[][$dia] = [x], no $horario[][x] = [$contenido])
                    echo '<th>' . $dia . '</th>';
                }
                echo '</tr>'; // Cierre para th

                // Mostrar las horas y asignaturas
                for ($i = 1; $i <= count($horario); $i++) {
                    echo '<tr>'; // Una fila por cada hora
                    echo '<td>' . $i . '</td>'; // Saca el índice (hora)

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
            ?>
        </table>
    </body>
</html>