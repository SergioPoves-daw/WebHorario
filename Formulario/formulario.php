<?php
    if (isset($_GET["asignatura"]))
        $asignatura =  $_GET["asignatura"]; // Checkbox

    if (isset($_GET["profesor"]))
       $profesor = $_GET["profesor"];  // Como el name es profesor[], se guarda en array porque son varios valores aunque aquí no se declare como array
    
    $horas = $_GET["horas"]; // Text
    $info = $_GET["info"]; // Textarea
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info asignaturas</title>
</head>
    <body>
        <?php
        print_r($_GET)
        ?>
        <table>
            <tr>
                <?php
                    // Si asignatura está vacío saca error, pero el resto no aunque estén vacíos
                    if (isset($asignatura))
                        echo '<p>Asignatura: ' . $asignatura . '</p>';
                    else
                        echo '<p>Selecciona la asignatura que imparte el profesor</p>';

                    if (!empty($profesor)) {
                        /*foreach ($profesor as $nombre) {
                            echo '<p>Profesor: ' . $nombre . '</p>';
                        }*/
                            
                        for ($i = 0; $i < count($profesor); $i++) {
                            echo '<p>Profesor: ' . $profesor[$i] . '</p>';
                        }
                    }
                    else {
                        echo '<p>Selecciona el profesor que imparte la asignatura</p>';
                    }
                    
                    if (!empty($horas))
                        echo '<p>Horas: ' . $horas . '</p>';
                    else
                        echo '<p>Introduce las horas que imparte el profesor</p>';
                    
                    if (!empty($info))
                        echo '<p>Información extra: ' . $info . '</p>';
                    else
                        echo '<p>No se ha introducido ninguna información o comentario</p>';
                ?>
            </tr>
        </table>
    </body>
</html>