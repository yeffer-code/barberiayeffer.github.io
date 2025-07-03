<?php
session_start();
include "conexion.php";

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = mysqli_real_escape_string($conex, trim($_POST['usuario']));
    $clave = md5(trim($_POST['clave'])); // MD5 aquí también

    $sql = "SELECT * FROM Clientes WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = mysqli_query($conex, $sql);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: indexsi.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Debes completar ambos campos.";
}
?>
