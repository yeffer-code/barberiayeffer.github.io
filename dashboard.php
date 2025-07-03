<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Barberia - Panel Administrativo</title>
         <link rel="stylesheet" href="estilos/estilo_sistema_barber.css">
    </head>
    <body>
        <div class="barra-lateral">
            <div class="logo">
                Bienvenido al Sistema
            </div>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Tablero</a></li>
                <li><a href="dashboard_usuarios.php"><i class="fas fa-book"></i>Usuarios</a></li>
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
                <a href="#">Sistema de barberia</a> / <a href="#">admin</a>
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
            <h1>Panel Administrativo</h1>
            <p style="color: #666; margin-bottom: 30px;">Reportes gráficos del sistema biblioteca.</p>
            <div class="dashboard-cards">
                <div class="card prestamos">
                    <div class="card-header">
                        <span class="title">Total de citas</span>
                        <i class="fas fa-shopping-cart icon"></i>
                    </div>
                    <div class="card-value">7</div>
                    <a href="#" class="view-details">VER DETALLE</a>
                </div>
                <div class="card libros">
                    <div class="card-header">
                        <span class="title">Total de Clientes</span>
                        <i class="fas fa-book icon"></i>
                    </div>
                    <div class="card-value">4</div>
                    <a href="#" class="view-details">VER DETALLE</a>
                </div>
                <div class="card estudiantes">
                    <div class="card-header">
                        <span class="title">Total Citas atendidas</span>
                        <i class="fas fa-users icon"></i>
                    </div>
                    <div class="card-value">5</div>
                    <a href="#" class="view-details">VER DETALLE</a>
                </div>
            </div>
            <div class="dashboard-charts">
                <div class="chart-card">
                    <div class="chart-title">Últimos 7 Días de Prestamos <i class="fas fa-ellipsis-h"></i></div>
                    <div class="chart-placeholder">
                        [Gráfico de Líneas aquí]
                    </div>
                </div>
                <div class="chart-card">
                    <div class="chart-title">Cantidad prestamos x día <i class="fas fa-ellipsis-h"></i></div>
                    <div class="chart-placeholder">
                        [Gráfico de Dona aquí]
                        <p style="font-size: 0.7em; margin-top: 10px;">Prestados: 15</p>
                    </div>
                </div>
                <div class="chart-card">
                    <div class="chart-title">Nuevo Libros <i class="fas fa-ellipsis-h"></i></div>
                    <div class="chart-placeholder">
                        [Gráfico de Pastel aquí]
                        <div style="font-size: 0.7em; text-align: center; margin-top: 10px;">
                            <span style="display: block;">DATA SCIENCE</span>
                            <span style="display: block;">JAVASCRIPT ELOQUENT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            Copyright © 2025.Todo los Derechos Reservados.
        </div>
    </body>
</html>



