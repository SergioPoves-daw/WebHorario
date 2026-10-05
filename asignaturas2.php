<?php
include 'configdb.php';

    if (!$resultado->num_rows) { // Si no hay filas
      echo "No hay asignaturas";  
    }
    else {
        // Saca la segunda fila en lugar de la primera, buscar otra manera en lugar de hacerlo con if (o algo asi)
        while ($fila = $resultado->fetch_array()) {
            echo '<p>' . $fila["idAsignatura"] . '. ' . $fila["nombre"] . ', ' . $fila["color"] . '</p>';
        }
    }
?>