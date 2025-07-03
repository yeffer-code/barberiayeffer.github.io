<?php
include 'conexion.php'; // Incluye la conexión a la BD

$sql = "SELECT 
  Citas.id_Citas, 
  Citas.fecha_reserva, 
  Citas.hora_reserva, 
  Citas.estado, 
  Clientes.Nombre_Completo, 
  servicios.nombre
FROM Citas
INNER JOIN Clientes ON Citas.id_cliente = Clientes.id_cliente
INNER JOIN servicios ON Citas.id = servicios.id;";

$resultado = $conexion->query($sql);
?>
