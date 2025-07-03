<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - Administración</title>
  <!-- Enlazar la hoja de estilo externa -->
  <link rel="stylesheet" href="estilos/estilo_loguin.css">
</head>
<body>
  <div class="login-container">

    <div class="logo">
      <img src="img/admin-logo.png"width="100" height="100" alt="Logo de la Administración">
      <h2>Acceso Administración</h2>
    </div>

    <form action="validar.php" method="POST">
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" id="usuario" required>

      <label for="clave">Contraseña:</label>
      <input type="password" name="clave" id="clave" required>

      <button type="submit">Ingresar</button>
    </form>
  </div>
</body>
</html>
