<?php
session_start();
include "conexion.php";

$usuario = $_POST['usuario'];
$clave = md5($_POST['clave']); // Igual que en la base de datos

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
