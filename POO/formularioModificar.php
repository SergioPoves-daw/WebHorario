<?php
    require 'casignatura.php';
    $info = new Casignatura($conexion);

    $id = $_GET["id"]; // <a> manda los datos por GET y lo recibe el .php
    $asignatura = $info->obtenerAsignatura($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar fila</title>
</head>
<body>
    <h1>Modificar asignatura</h1>
    <?php
        // Usar el id recibido del <a> en el form para que modificar.php sepa a qué fila (id) referirse
        echo '<form action="modificar.php?id=' . $id . '" method="POST">';
        echo '<p>ID: ' . $id . '</p>';

        // Valor por defecto el nombre de la asignatura
        echo '<label for="nombre">Nombre: </label>';
        echo '<input type="text" id="nombre" name="nombre" value="'. $asignatura["nombre"] . '"/>';

        echo '<br/><br/>';
        
        // Valor por defecto el color de la asignatura
        echo '<label for="color">Color: </label>';
        echo '<input type="text" id="color" name="color" maxlength=7 value="'. $asignatura["color"] . '"/>';
    ?>
        <br/><br/>
        <input type="submit" value="Modificar asignatura">
    </form>
</body>
</html>