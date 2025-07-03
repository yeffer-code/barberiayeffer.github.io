<?php

// para validaciones i insertar datos
$host = "database-1.c3iu2u4q49dc.us-east-2.rds.amazonaws.com";
$user = "admin";
$pass = "rootaws123";
$db = "BD_Barber_web";

$conex = mysqli_connect($host, $user, $pass, $db);

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conex, "utf8");
?>


<?php
//para llevar datos a la pagina principal
$conexion = new mysqli("database-1.c3iu2u4q49dc.us-east-2.rds.amazonaws.com", "admin", "rootaws123", "BD_Barber_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>



