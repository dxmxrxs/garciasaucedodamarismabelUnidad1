<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="registro.php">Registrarse</a></li>
        <li><a href="login.php">Iniciar Sesión</a></li>
        <li><a href="index.html">Inicio</a></li>
      </ul>
    </nav>
  </header>
  <div class="error-box">
    <h2>🔐 Recuperar Contraseña</h2>
    <form method="post" action="enviar_recuperacion.php">
      <input type="email" name="correo" placeholder="Introduce tu correo" required>
      <input type="submit" value="Enviar enlace de recuperación">
    </form>
    <a href="index.html" class="btn">Volver</a>
  </div>
  <footer style="background:#ffb6c1; color:#5c005c; text-align:center; padding:1em 0; margin-top:3em; font-family: 'Comic Sans MS', cursive;">
  <p>🌸 &copy; 2025 Florería Chiquita. Todos los derechos reservados.</p>
  <p>📞 Contacto: <a href="tel:+123456789" style="color:#d63384; text-decoration:none;">+12 345 6789</a> | 📧 <a href="mailto:info@floreriachiquita.com" style="color:#d63384; text-decoration:none;">info@floreriachiquita.com</a></p>
</footer>

</body>
</html>
