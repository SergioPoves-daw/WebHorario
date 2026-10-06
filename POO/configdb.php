<?php
    $conexion = new mysqli('localhost', 'root', '', 'horario');
    $sql = "SELECT * FROM asignaturas;";
    $resultado = $conexion->query($sql);
?>