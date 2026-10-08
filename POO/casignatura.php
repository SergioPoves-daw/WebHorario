<?php
    include './configdb.php'; // Trae la conexión directamente a la función
    /* Así cuando los archivos hacen include de este archivo, pueden llamar al constructor 
    con parámetro $conexion sin tener que hacer include de configdb.php */

        
    class Casignatura {
        private $conexion;

        function __construct($conexion) {
            $this->conexion = $conexion;
        }

        // Obtener filas de la BD
        function obtenerDatos() {
            $sql = "SELECT * FROM asignaturas;";
            $resultado = $this->conexion->query($sql); // Coge el $conexion de la clase
            $asignaturas = [];

            if ($resultado->num_rows > 0) { // Si hay filas, guarda en $asignaturas[] tantas filas como asignaturas hayan con su información
                while ($filas = $resultado->fetch_assoc()) {
                    $asignaturas[] = $filas;
                }
                return $asignaturas;
            }
            
        }

        // Visualizar asignaturas y su color
        function listarAsignaturas($asignaturas) {
            if (isset($asignaturas)) {
                foreach ($asignaturas as $asignatura) {
                    echo '<tr>';
                    echo '<td>' . $asignatura["nombre"] . '</td>';
                    echo '<td style="background-color: ' . $asignatura["color"] . ';">' . $asignatura["color"] . '</td>';
                    echo '<td>';

                    // Mandar ID por GET a la página modificar
                    echo '<a href="formularioModificar.php?id=' . $asignatura["idAsignatura"] . '">M</a>';

                    // Mandar ID por GET a la página eliminar
                    echo '<a href="eliminar.php?id=' . $asignatura["idAsignatura"] . '">E</a>';

                    echo '</td>';
                    echo '</tr>';
                }
            }

            else {
                echo '<p>No hay asignaturas</p>';
            }
        }

        // Obtiene el ID del <a href> del listado y visualiza el formulario
        function mostrarId($id) {
            $sql = "SELECT * FROM asignaturas WHERE idAsignatura = " . $id . ";";
            $resultado = $this->conexion->query($sql);
            $asignatura = $resultado->fetch_assoc();

            echo '<p>ID: ' . $id . '</p>';

            // Valor por defecto el nombre de la asignatura
            echo '<label for="nombre">Nombre: </label>';
            echo '<input type="text" id="nombre" name="nombre" value="'. $asignatura["nombre"] . '"/>';

            echo '<br/><br/>';
            
            // Valor por defecto el color de la asignatura
            echo '<label for="color">Color: </label>';
            echo '<input type="text" id="color" name="color" value="'. $asignatura["color"] . '"/>';
        }

        // Insertar fila
        function insertarDatos($asignatura, $color) {
            $sql = 'INSERT INTO asignaturas(nombre, color) VALUES("' . $asignatura . '", "' . $color . '");';
            $resultado = $this->conexion->query($sql);
            echo '<p>Asignatura añadida</p>';
            header("refresh:2 url=infoAsignaturas.php"); // Esperar 2 segundos antes de redirigir a infoAsignaturas.php
        }

        // Modifica la fila
        function modificarFila($id, $nombre, $color) {
            $sql = 'UPDATE asignaturas SET nombre ="' . $nombre . '", color="' . $color . '" WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            echo 'Fila modificada';
            header("refresh:2 url=infoAsignaturas.php"); // Esperar 2 segundos antes de redirigir a infoAsignaturas.php
        }
    }
?>