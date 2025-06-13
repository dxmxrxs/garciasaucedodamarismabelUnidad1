<?php
require_once 'dbconexion.php';

if (!isset($_GET['token'])) {
    echo "❌ Token no proporcionado.";
    exit();
}

$token = $_GET['token'];

// Buscar token en la base de datos
$stmt = $cnnPDO->prepare("SELECT * FROM usuarios WHERE token_recuperacion = :token AND token_expira > NOW()");
$stmt->bindParam(':token', $token);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "❌ Token inválido o expirado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="error-box">
    <h2>🔒 Nueva Contraseña</h2>
    <form method="post" action="cambiar_password.php">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
      <input type="password" name="password" placeholder="Nueva contraseña" required>
      <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>
      <input type="submit" value="Cambiar contraseña">
    </form>
  </div>
</body>
</html>
