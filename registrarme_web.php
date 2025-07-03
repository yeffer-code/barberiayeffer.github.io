<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="estilos/estilo_registro.css">
    <link rel="stylesheet" href="estilos/estilo_registrarme.css">
</head>
<body>
    <div class="register-container">
        <div class="header">
            <h2>Crear Cuenta</h2>
            <p>Únete a mi comunidad de clientes.</p>
        </div>

        <form action="G_registrarme.php" method="POST">
            <div class="input-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" maxlength="8" required>
            </div>

            <div class="input-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" name="nombre_completo" id="nombre_completo" maxlength="150" required>
            </div>

            <div class="input-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" maxlength="9">
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="input-group">
                <label for="usuario">Nombre de Usuario:</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>

            <div class="input-group">
                <label for="clave">Contraseña:</label>
                <input type="password" name="clave" id="clave" required>
            </div>

            <div class="input-group">
                <label for="confirmar_clave">Confirmar Contraseña:</label>
                <input type="password" name="confirmar_clave" id="confirmar_clave" required>
            </div>
            
            <div class="terms-checkbox">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Acepto los <a href="#" target="_blank">Términos y Condiciones</a></label>
            </div>

            <button type="submit" class="register-button">Registrarse</button>
        </form>

        <div class="login-prompt">
            <p>¿Ya tienes una cuenta? <a href="inicio_sion.php">Iniciar Sesión</a></p>
        </div>
    </div>
</body>
</html>