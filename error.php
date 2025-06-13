<?php
http_response_code(404);
$error = $_GET['error'] ?? 'error_desconocido';

switch ($error) {
  case 'campos_vacios':
    $mensaje = "Por favor llena todos los campos.";
    break;
  case 'correo_invalido':
    $mensaje = "El correo electrónico no es válido.";
    break;
  default:
    $mensaje = "La página que buscas no existe o ocurrió un error.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Error 404 - Página no encontrada</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive;
      background: #ffe6f2;
      color: #5c005c;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    header {
      background: #ffb6c1;
      padding: 1em 0;
    }

    header h1 {
      margin: 0;
      font-size: 2em;
    }

    .error-box {
      background: #fff0f5;
      margin: 5em auto;
      padding: 2em;
      width: 80%;
      max-width: 400px;
      border: 3px dashed #ff1493;
      border-radius: 15px;
    }

    .error-box h2 {
      font-size: 2em;
      margin-bottom: 0.5em;
    }

    .error-box p {
      font-size: 1.2em;
    }

    .btn {
      display: inline-block;
      margin-top: 1em;
      padding: 10px 20px;
      background: #ff69b4;
      color: white;
      border-radius: 15px;
      text-decoration: none;
      font-weight: bold;
      border: 2px solid #d63384;
    }

    .btn:hover {
      background: #ff1493;
    }
  </style>
</head>
<body>

  <header>
    <h1>¡Oops! Algo salió mal 💔</h1>
  </header>

  <div class="error-box">
    <h2>Error 404 😢</h2>
    <p><?php echo $mensaje; ?></p>
    <a class="btn" href="index.html">Volver al formulario</a>
  </div>

</body>
</html>
