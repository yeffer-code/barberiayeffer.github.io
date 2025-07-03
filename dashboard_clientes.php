<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}
?>

<?php include 'Consultas-php/obtener_clientes.php'; ?> <!-- Incluye el archivo que tiene $resultado -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Barberia - Panel Lista de Citas</title>
         <link rel="stylesheet" href="estilos/estilo-dashboard-citas.css">
    </head>
    <body>
        <div class="barra-lateral">
            <div class="logo">
                Bienvenido al Sistema
            </div>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Tablero</a></li>
                <li><a href="#"><i class="fas fa-book"></i>Usuarios</a></li>
                <li><a href="dashboard_clientes.php"><i class="fas fa-book"></i>Clientes</a></li>
                <li><a href="dashboard_citas.php"><i class="fas fa-book"></i>Lista de Citas</a></li>
                <li><a href="dashboard_servicio.php"><i class="fas fa-book"></i>Servicios</a></li>
                <li><a href="dashboard_empleados.php"><i class="fas fa-book"></i>Empleados</a></li>
            </li>
                <li><a href="cerrar.php"><i class="fas fa-book"></i>Cerrar Sesion</a></li>
            </ul>
        </div>
        <div class="main-content">
        <div class="header">
            <div class="breadcrumbs">
                <a href="#">Sistema de barberia</a> / <a href="#">Clientes</a>
            </div>
            <div class="user-info">
                <div class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="badge">2</span>
                </div>
                <div class="user-avatar">AD</div>
                <div>
                    <h2>Bienvenido: <?php echo $_SESSION['usuario']; ?></h2>
                </div>
            </div>
            <div class="settings-icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>

        <div class="dashboard-content">
           <h1>Lista de Clientes</h1>
           <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>DNI</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultado && $resultado->num_rows > 0): ?>
                        <?php while($fila = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($fila['id_cliente']) ?></td>
                                <td><?= htmlspecialchars($fila['Dni']) ?></td>
                                <td><?= htmlspecialchars($fila['Nombre_Completo']) ?></td>
                                <td><?= htmlspecialchars($fila['Telefono']) ?></td>
                                <td><?= htmlspecialchars($fila['email']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <tr><td colspan="5">No se encontraron resultados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            Copyright © 2025.Todo los Derechos Reservados.
        </div>
    </body>
</html>

