<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro 🌸</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
    function validarFormulario() {
      const pass1 = document.getElementById("password").value;
      const pass2 = document.getElementById("confirmar").value;
      if (pass1 !== pass2) {
        alert("Las contraseñas no coinciden 💔");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <header>
    <h1>Registrarse 🌷</h1>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="recuperar.php">Recuperar Contraseña</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="registrar.php" method="POST" onsubmit="return validarFormulario();">
      <h2>Crear Cuenta</h2>
      <input type="text" name="nombre" placeholder="Nombre completo" required>
      <input type="email" name="correo" placeholder="Correo electrónico" required>
      <input type="password" name="password" id="password" placeholder="Contraseña" required>
      <input type="password" id="confirmar" placeholder="Confirmar contraseña" required>
      <div class="g-recaptcha" data-sitekey="6LcZ0V0rAAAAADyKL7ayTRwwQt3Gmq-zYZmxaUdy"></div>
      <input type="submit" value="Registrarse">
    </form>
  </main>
  <footer style="background:#ffb6c1; color:#5c005c; text-align:center; padding:1em 0; margin-top:3em; font-family: 'Comic Sans MS', cursive;">
  <p>🌸 &copy; 2025 Florería Chiquita. Todos los derechos reservados.</p>
  <p>📞 Contacto: <a href="tel:+123456789" style="color:#d63384; text-decoration:none;">+12 345 6789</a> | 📧 <a href="mailto:info@floreriachiquita.com" style="color:#d63384; text-decoration:none;">info@floreriachiquita.com</a></p>
</footer>

</body>
</html>
