<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        !empty($_POST['categoria']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['descripcion']) &&
        !empty($_POST['precio']) 
        
    ){
        $categoria = mysqli_real_escape_string($conex, trim($_POST['categoria']));
        $nombre = mysqli_real_escape_string($conex, trim($_POST['nombre']));
        $descripcion = mysqli_real_escape_string($conex, trim($_POST['descripcion']));
        $precio = mysqli_real_escape_string($conex, trim($_POST['precio']));

        $consulta = "INSERT INTO servicios (categoria,nombre,descripcion,precio)
                     VALUES ('$categoria', '$nombre', '$descripcion', '$precio')";

        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            echo '<h3 class="ok">Servicio agregado Correctamente</h3>';
        } else {
            echo '<h3 class="error">Ocurrió un error: ' . mysqli_error($conex) . '</h3>';
        }
    } else {
        echo '<h3 class="error">Por favor completa todos los campos y acepta los términos</h3>';
    }
    }
?>