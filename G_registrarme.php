<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica que todos los campos requeridos estén presentes
    if (
        !empty($_POST['dni']) &&
        !empty($_POST['nombre_completo']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['email']) &&
        !empty($_POST['usuario']) &&
        !empty($_POST['clave']) &&
        !empty($_POST['confirmar_clave']) &&
        isset($_POST['terms'])
    ) {

        $dni = mysqli_real_escape_string($conex, trim($_POST['dni']));
        $nombrecompleto = mysqli_real_escape_string($conex, trim($_POST['nombre_completo']));
        $telefono = mysqli_real_escape_string($conex, trim($_POST['telefono']));
        $email = mysqli_real_escape_string($conex, trim($_POST['email']));
        $usuario = mysqli_real_escape_string($conex, trim($_POST['usuario']));
        $clave = trim($_POST['clave']);
        $confirmar_clave = trim($_POST['confirmar_clave']);

        // Verifica que las contraseñas coincidan
        if ($clave !== $confirmar_clave) {
            echo '<h3 class="error">Las contraseñas no coinciden</h3>';
            exit;
        }

        // Opcional: Verificar que el usuario o email no exista ya
        $verificar_usuario = mysqli_query($conex, "SELECT * FROM Clientes WHERE usuario = '$usuario' OR email = '$email'");
        if (mysqli_num_rows($verificar_usuario) > 0) {
            echo '<h3 class="error">El usuario o correo ya está registrado</h3>';
            exit;
        }

        // Encriptar la contraseña (mejor que MD5)
       $clave_segura = md5($clave);


        // Insertar datos en la base de datos
        $consulta = "INSERT INTO Clientes (Dni, Nombre_Completo, Telefono, email, usuario, clave)
                     VALUES ('$dni', '$nombrecompleto', '$telefono', '$email', '$usuario', '$clave_segura')";

        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            echo '<h3 class="ok">Te registraste correctamente</h3>';
        } else {
            echo '<h3 class="error">Ocurrió un error: ' . mysqli_error($conex) . '</h3>';
        }
    } else {
        echo '<h3 class="error">Por favor completa todos los campos y acepta los términos</h3>';
    }
}
?>
