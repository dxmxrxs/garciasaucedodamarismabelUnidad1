<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión 🌸</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Iniciar Sesión 🌷</h1>
    <nav>
      <ul>
        <li><a href="registro.php">Registrarse</a></li>
        <li><a href="recuperar.php">Recuperar Contraseña</a></li>
        <li><a href="index.html">Inicio</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="validar_login.php" method="POST">
      <h2>Accede a tu cuenta</h2>
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <input type="submit" value="Iniciar Sesión">
    </form>
  </main>
  <footer style="background:#ffb6c1; color:#5c005c; text-align:center; padding:1em 0; margin-top:3em; font-family: 'Comic Sans MS', cursive;">
  <p>🌸 &copy; 2025 Florería Chiquita. Todos los derechos reservados.</p>
  <p>📞 Contacto: <a href="tel:+123456789" style="color:#d63384; text-decoration:none;">+12 345 6789</a> | 📧 <a href="mailto:info@floreriachiquita.com" style="color:#d63384; text-decoration:none;">info@floreriachiquita.com</a></p>
</footer>

</body>
</html>
