<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $destinatario = "rodriguezcamayoyeffer28@gmail.com"; // CAMBIA esto por tu correo
    $contenido = "Nombre: $nombre\nCorreo: $correo\nAsunto: $asunto\nMensaje:\n$mensaje";
    $cabeceras = "From: $correo";

    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
