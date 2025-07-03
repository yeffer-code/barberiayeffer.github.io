<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="estilos/estilo_loguin.css">
</head>
<body>
  <div class="login-container">

    <div class="logo">
      <h2>Inicio Sesion</h2>
    </div>

    <form action="validador_user_web.php" method="POST">
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" id="usuario" required>

      <label for="clave">Contraseña:</label>
      <input type="password" name="clave" id="clave" required>

      <button type="submit">Ingresar</button>
    </form>

    <div class="register-link">
      <p>¿No tienes cuenta? <a href="registrarme_web.php">Regístrate aquí</a></p>
    </div>

  </div>
</body>
</html>