<?php include 'datos_servicios.php'; ?>
<?php
// 1. Iniciar la sesión (siempre al principio, antes de cualquier salida HTML)
session_start();

// 2. Incluir el archivo de conexión a la base de datos
include 'conexion.php'; // Asegúrate de que la ruta sea correcta

$current_username = "Invitado"; // Valor por defecto si el usuario no ha iniciado sesión

// 3. Verificar si el usuario ha iniciado sesión y obtener su nombre de usuario
if (isset($_SESSION['user_id'])) { // Suponiendo que guardas el ID del cliente en la sesión
    $user_id = $_SESSION['user_id'];

    // Prepara la consulta para evitar inyecciones SQL
    // ¡CAMBIO AQUÍ!: SELECT usuario FROM Clientes (en lugar de username FROM usuarios)
    $stmt = $conn->prepare("SELECT usuario FROM Clientes WHERE id_cliente = ?");
    $stmt->bind_param("i", $user_id); // "i" indica que user_id es un entero
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_username = htmlspecialchars($row['usuario']); // Escapa el nombre para seguridad
    }
    $stmt->close();

} elseif (isset($_SESSION['usuario'])) { // Si guardas directamente el 'usuario' en la sesión
    $current_username = htmlspecialchars($_SESSION['usuario']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peluquería ConfiguroWeb</title>
  <link rel="stylesheet" href="estilos/estilo-html.css"> <!-- Enlace al CSS externo -->
</head>
<body>

  <header>
    <img src="img/logo_principa.png" width="50" height="50" alt="Logo">
    <nav>
      <a href="index.html">INICIO</a>
      <a href="#">SERVICIOS</a>
      <a href="#">GALERÍA</a>
      <a href="contacto.html">CONTÁCTANOS</a>
      <a href=""><span class="username"><?php echo $current_username; ?></span></a>
    </nav>

  </header>

    <div class="banner-contenedor img">
       <div class="texto-banner">
        Barbería moderna que ofrece cortes de cabello, afeitados clásicos, perfilado de barba y cuidado
        masculino en un ambiente profesional y con estilo. Atención personalizada por barberos expertos.
      </div>
      <img src="img/principal1.png" width="1521" height="800" >
    </div>

  <div class="container">
        <div class="left">
          <h2>Estamos para ti</h2>
          <h1>Somos Una Barberia <br>Desde 2023</h1>
           <img src="img/silueta-corte.png" alt="Logo peluquería" class="logo">
          <p>
          Somos una Barberia enfocada en nuestros clientes, antes de empezar analizamos tu fisonomía para recomendarte tu mejor corte.
          Como siempre respetando como máxima tu criterio, tus gustos y preferencias ante todos.
           </p>
          <button>MÁS ACERCA DE NOSOTROS</button>
        </div>
        <div class="images">
            <img src="img/corte 1.jpg" alt="Corte de cabello">
            <img src="img/corte_2.jpg" alt="Peinado">
            <img src="img/corte_3.png" alt="Cabello largo">
        </div>
  </div>

    <section class="servicios">
        <h2>Nuestros Servicios</h2>
         <img src="img/barba_logo.png" alt="decoración" class="decoracion">

      <div class="tarjetas">
         <div class="tarjeta">
            <img src="img/corte_cabello_1.jpg" alt="Cortes de Cabello">
            <h4>Cortes de Cabello</h4>
            <p>Los mejores cortes de cabellos adaptados a la fisonomía de tu cara</p>
          </div>
          <div class="tarjeta">
              <img src="img/barba.jpg" alt="Corte de Barba"   >
              <h4>Corte de Barba</h4>
              <p>Nos ajustamos a tu barba, te damos los mejores consejos posibles.</p>
          </div>
          <div class="tarjeta">
              <img src="img/afeitado.jpg" alt="Afeitado Suave">
              <h4>Afeitado Suave</h4>
               <p>Incluimos un tratamiento, de cremas y bálsamos que cuidan tu piel.</p>
          </div>
          <div class="tarjeta">
              <img src="img/mascarrilla.jpg" alt="Mascarilla Facial">
              <h4>Mascarilla Facial</h4>
              <p>Aplicamos los mejores tratamiento, para cuidar tu piel y humectarla.</p>
          </div>
        </div>
      </section>

      <section class="seccion-cita">
        <div class="imagen-cita"></div>
        <div class="contenido-cita">
          <h2>Reserva tu Cita</h2>
          <p>En unos sencillos pasos, solo elige la fecha y podrás reservar tu cita sin problemas.</p>
          
          <div class="formulario">
            <input type="date" placeholder="dd/mm/aaaa">
            <input type="time" placeholder="--:--">
            <button class="btn-reservar">Reservar Cita</button>
          </div>
        </div>
      </section>

      <section class="empleados">
        <h2>Nuestros Barberos Professionales</h2>
          <div class="tarjeta-empleados">
            <img src="img/barbero-profesional-1.jpg" alt="barbero1">
            <p>NOMBRE:Carlos Andrés Herrera Gómez </p>
            <p>EXPERIENCIA: 4 años</p>
          </div>

        <div class="tarjeta-empleados">
            <img src="img/barbero`professional-2.jpg" alt="barbero2">
            <p>NOMBRE: José Antonio Morales Castillo</p>
            <p>EXPERIENCIA:3 años </p>
        </div>

        <div class="tarjeta-empleados">
            <img src="img/barbero-prefesiomnal-3.png" alt="barbero3">
            <p>NOMBRE:Juan Carlos Mendoza Torres </p>
            <p>EXPERIENCIA: 5 años </p>
        </div>
      </section>


      <section id="precios">
        <h1>Nuestros Precios</h1>
        <div class="separador">---------------</div>
        <div class="contenedor-columnas">
            <?php foreach ($datos as $categoria => $servicios): ?>
                <div class="columna">
                    <h2 class="titulo-categoria"><?= htmlspecialchars($categoria) ?></h2>
                    <?php foreach ($servicios as $servicio): ?>
                        <div class="servicio">
                            <div class="encabezado-servicio">
                                <span><?= htmlspecialchars($servicio['nombre']) ?></span>
                                <span>$<?= number_format($servicio['precio'], 2) ?></span>
                            </div>
                            <p><?= htmlspecialchars($servicio['descripcion']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>  

    <section class="ubicaciones">
        <h2>Nuestras Ubicaciones</h2>

        <div class="tarjeta-sucursales">
          <div class="info">
            <h1>Sucursales:</h1>
            <p>Calle Falsa 123, Ciudad A</p>
            <p>Avenida Siempre Viva 742, Ciudad</p>
            <p>Boulevard Central 456, Ciudad</p>
            
         </div>
          <img src="img/ubica.jpg" alt="Ubicación">
        </div>
    </section>

      <footer class="footer">
        <div class="footer-content">
            <div class="footer-info">
                <p>&copy; 2025 Barberia. Todos los derechos reservados.</p>
                <p>Dirección: AV: Guindales</p>
                <p>Teléfono: 956-456-456</p>
            </div>
            <div class="social-icons">
                 <p>Nuestras Redes Sociales:</p>
                <a href="https://web.facebook.com/yeffer.rodriguez.10236" target="_blank" aria-label="Facebook">
                    <img src="img/logo-feacebook.png" alt="Facebook">
                </a>
                <a href="http://www.youtube.com/@yefferRC" target="_blank" aria-label="youtube">
                    <img src="img/logo-youtube.png" alt="youtube">
                </a>
                <a href="https://www.tiktok.com/@yeffer28rc" target="_blank" aria-label="Tik Tok">
                    <img src="img/logo-tiktok.png" alt="tik tok">
                </a>
                <a href=""target="_blank" aria-label="instagrms">
                   <img src="img/logo-instagram.png" alt="instagrms">
                </a>
            </div>
        </div>
    </footer>

  </body>
</html>
