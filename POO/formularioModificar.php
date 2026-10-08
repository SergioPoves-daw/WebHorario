<?php
    require 'casignatura.php';
    $asignatura = new Casignatura($conexion);

    $id = $_GET["id"]; // <a> manda los datos por GET y lo recibe el .php
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
        $asignatura->mostrarId($id); // Función que coge los datos de la fila por el ID y los visualiza en los inputs
    ?>
        <br/><br/>
        <input type="submit" value="Modificar asignatura">
    </form>
</body>
</html>