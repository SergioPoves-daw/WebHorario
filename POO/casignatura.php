<?php
    class Casignatura {
        private $asignaturas = [];

        // Obtener filas de la BD
        function obtenerDatos() {
            include './configdb.php'; // Trae la conexión directamente a la función

            if ($resultado->num_rows > 0) {
                while ($filas = $resultado->fetch_assoc()) { // Usa el $resultado del configdb
                    $asignaturas[] = $filas;
                }
                return $asignaturas;
            }
            
        }

        // Insertar fila
        function insertarDatos($asignatura, $color) {
            $conexion = new mysqli('localhost', 'root', '', 'horario');
            $sql = 'INSERT INTO asignaturas(nombre, color) VALUES("' . $asignatura . '", "' . $color . '");';
            $resultado = $conexion->query($sql);
        }

        // Visualizar asignaturas y su color
        function listarAsignaturas($asignaturas) {
            if (isset($asignaturas)) {
                foreach ($asignaturas as $asignatura) {
                    echo '<tr>';
                    echo '<td>' . $asignatura["nombre"] . '</td>';
                    echo '<td style="background-color: ' . $asignatura["color"] . ';">' . $asignatura["color"] . '</td>';
                    echo '<tr>';
                }
            }

            else {
                echo '<p>No hay asignaturas</p>';
            }
        }
    }
?>