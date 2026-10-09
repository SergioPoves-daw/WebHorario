<?php
    include './configdb.php'; // Trae la conexión directamente a la función
    /* Así cuando los archivos hacen include de este archivo, pueden llamar al constructor 
    con parámetro $conexion sin tener que hacer include de configdb.php */

        
    class Casignatura {
        private $conexion;
        public $mensaje;

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

        // Obtiene la fila individual entera de la asignatura del ID correspondiente
        function obtenerAsignatura($id) {
            $sql = "SELECT * FROM asignaturas WHERE idAsignatura = " . $id . ";";
            $resultado = $this->conexion->query($sql);
            $asignatura = $resultado->fetch_assoc();
            return $asignatura;
        }

        // Insertar fila
        function insertarDatos($asignatura, $color) {
            $sql = 'INSERT INTO asignaturas(nombre, color) VALUES("' . $asignatura . '", "' . $color . '");';
            $resultado = $this->conexion->query($sql);
            $this->mensaje = "Asignatura añadida";
        }

        // Modifica la fila
        function modificarFila($id, $nombre, $color) {
            $sql = 'UPDATE asignaturas SET nombre ="' . $nombre . '", color="' . $color . '" WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            $this->mensaje = "Asignatura modificada";
        }

        // Elimina la fila
        function eliminarAsignatura($id) {
            $sql = 'DELETE FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            $this->mensaje = "Asignatura eliminada";
        }
    }
?>