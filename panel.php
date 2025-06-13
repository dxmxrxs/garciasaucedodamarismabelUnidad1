<?php
session_start();

// Opcional: comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Redirigir al login u otra acción
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Panel de Usuario 🌸</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive;
      background: #ffe6f2;
      color: #5c005c;
      margin: 0;
      padding: 0;
    }
    nav {
      background-color: #ffb6c1;
      padding: 1em 2em;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    .panel-box {
      color: #5c005c;
      text-align: left;
    }
    .cerrar-form {
      margin-left: auto;
    }
    .btn-cerrar {
      background: #ff69b4;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      font-size: 1em;
    }
    .btn-cerrar:hover {
      background: #ff4b61;
    }

    main {
      padding: 2em;
    }

    .contenido-principal {
      display: flex;
      flex-wrap: wrap;
      gap: 2em;
      justify-content: center;
      align-items: flex-start;
    }

    .carrusel {
      position: relative;
      width: 100%;
      max-width: 400px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      flex: 1;
    }

    .slide {
      display: none;
    }
    .slide img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 15px;
    }
    .slide.activo {
      display: block;
    }

    button.prev,
    button.next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(255, 105, 180, 0.8);
      border: none;
      padding: 10px 14px;
      border-radius: 50%;
      color: white;
      font-size: 1.5em;
      cursor: pointer;
      z-index: 2;
    }

    button.prev:hover,
    button.next:hover {
      background-color: #ff4b61;
    }

    button.prev { left: 10px; }
    button.next { right: 10px; }

    .info-floreria {
      flex: 1;
      max-width: 500px;
      padding: 1em;
    }

    .info-floreria h2 {
      color: #c2185b;
    }

    /* Estilos para las cards */
    .card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      padding: 1.5em;
      margin: 1em 0;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .card:hover,
    .card:focus-within {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(197, 41, 123, 0.4);
      outline: none;
    }

    ul {
      list-style: none;
      padding-left: 0;
    }

    /* Container para las cards alineadas horizontalmente */
    .cards-row {
      display: flex;
      justify-content: center;
      gap: 1.5em;
      flex-wrap: wrap;
      max-width: 1000px;
      margin: 2em auto;
    }

    /* Cards iguales para alineación */
    .cards-row .card {
      flex: 1 1 220px; /* crecen y encogen con base mínima 220px */
      min-width: 220px;
    }

  </style>
</head>
<body>

<nav>
  <div class="panel-box">
    <h1>👤 ¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has iniciado sesión correctamente 🌼</p>
  </div>
  <form class="cerrar-form" action="cerrar_sesion.php" method="POST">
    <button type="submit" class="btn-cerrar">Cerrar Sesión</button>
  </form>
</nav>

<main>
  <h1 style="text-align:center; color: #d63384;">Mirar Catálogo 🌸</h1>

  <div class="contenido-principal">
    <!-- Carrusel -->
    <div class="carrusel">
      <div class="slide activo">
        <img src="img/imagen1.jpg" alt="Curso 1" />
      </div>
      <div class="slide">
        <img src="img/img2.jpg" alt="Curso 2" />
      </div>
      <div class="slide">
        <img src="img/img4.jpg" alt="Curso 3" />
      </div>
      <button class="prev">❮</button>
      <button class="next">❯</button>
    </div>

    <!-- Información de la florería en card -->
    <div class="info-floreria card" tabindex="0">
      <h2>Sobre Florería Chiquita 💐</h2>
      <p>En <strong>Florería Chiquita</strong> creemos que cada flor cuenta una historia. Nos dedicamos a crear arreglos florales únicos para todo tipo de ocasión: cumpleaños, aniversarios, graduaciones o simplemente para alegrar el día de alguien especial.</p>
    </div>
  </div>

  <!-- Cards dinámicas alineadas horizontalmente -->
  <div class="cards-row">
    <div class="card" tabindex="0">
      <h3 style="color: #d63384;">🌷 Misión</h3>
      <p>Brindar felicidad y color a través de nuestras flores, con creatividad, amor y un servicio cálido y personalizado.</p>
    </div>
    <div class="card" tabindex="0">
      <h3 style="color: #d63384;">🌻 Visión</h3>
      <p>Ser reconocidos como la florería más cercana, confiable y con el toque más tierno en nuestra comunidad.</p>
    </div>
    <div class="card" tabindex="0">
      <h3 style="color: #d63384;">🌼 Nuestros Valores</h3>
      <ul>
        <li>🌟 Amor por la naturaleza</li>
        <li>🤝 Cercanía y empatía con nuestros clientes</li>
        <li>🎨 Creatividad en cada arreglo</li>
        <li>💧 Compromiso con el medio ambiente</li>
      </ul>
    </div>
    <div class="card" tabindex="0">
      <h3 style="color: #d63384;">🌸 ¿Sabías que...?</h3>
      <p>Cada flor tiene un significado especial. Por ejemplo, las margaritas simbolizan inocencia, los girasoles representan alegría y los lirios blancos, paz y pureza. ¡Déjanos ayudarte a elegir la flor perfecta para ti o para esa persona especial!</p>
    </div>
  </div>
</main>
<footer style="background:#ffb6c1; color:#5c005c; text-align:center; padding:1em 0; margin-top:3em; font-family: 'Comic Sans MS', cursive;">
  <p>🌸 &copy; 2025 Florería Chiquita. Todos los derechos reservados.</p>
  <p>📞 Contacto: <a href="tel:+123456789" style="color:#d63384; text-decoration:none;">+12 345 6789</a> | 📧 <a href="mailto:info@floreriachiquita.com" style="color:#d63384; text-decoration:none;">info@floreriachiquita.com</a></p>
</footer>

<script>
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');
  let index = 0;

  function mostrarSlide(i) {
    slides.forEach(slide => slide.classList.remove('activo'));
    slides[i].classList.add('activo');
  }

  prevBtn.addEventListener('click', () => {
    index = (index - 1 + slides.length) % slides.length;
    mostrarSlide(index);
  });

  nextBtn.addEventListener('click', () => {
    index = (index + 1) % slides.length;
    mostrarSlide(index);
  });

  setInterval(() => {
    index = (index + 1) % slides.length;
    mostrarSlide(index);
  }, 5000);
</script>

</body>
</html>
