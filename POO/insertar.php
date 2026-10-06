<?php
    require './casignatura.php';

    $asignatura = $_POST["asignatura"];
    $color = $_POST["color"];
    $bd = new Casignatura();

    $bd->insertarDatos($asignatura, $color);
?>