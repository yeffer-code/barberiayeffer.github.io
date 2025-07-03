<?php
include("conexion.php");

$sql = "SELECT categoria, nombre, descripcion, precio FROM servicios ORDER BY categoria";
$resultado = $conexion->query($sql);

$datos = [];

while ($row = $resultado->fetch_assoc()) {
    $datos[$row['categoria']][] = $row;
}
?>
