<?php
session_start();
require_once 'dbconexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretKey = "6LcZ0V0rAAAAABd4Ofxkg8jldtUqQD-22-lpmTDf"; // clave secreta
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => $secretKey,
        'response' => $responseKey,
        'remoteip' => $userIP
    ];

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captchaSuccess = json_decode($verify);

    if (!$captchaSuccess->success) {
        echo "<script>alert('❌ Por favor verifica que no eres un robot.'); window.history.back();</script>";
        exit();
    }

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    if (empty($nombre) || empty($correo) || empty($password)) {
        echo "<script>alert('⚠️ Todos los campos son obligatorios.'); window.history.back();</script>";
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('⚠️ El correo no es válido.'); window.history.back();</script>";
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 4. Insertar en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)";
        $stmt = $cnnPDO->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $passwordHash);

        if ($stmt->execute()) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'carnicerialablanca31@gmail.com';
                $mail->Password = 'hska mfel anza crrq'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('saucedodamaris804@gmail.com', 'Floreria Chiquita');
                $mail->addAddress($correo);

                $mail->isHTML(true);
                $mail->Subject = 'Bienvenido a Floreria Chiquita';
                $mail->Body = '
                    <h3>¡Hola ' . htmlspecialchars($nombre) . ' 👋!</h3>
                    <p>Tu registro en <strong>Florería Chiquita</strong> se ha completado con éxito.</p>
                    <p>Gracias por unirte. Ya puedes iniciar sesión con tu cuenta.</p>
                    <p><a href="https://tu-sitio.com/login.php">Haz clic aquí para iniciar sesión</a></p>
                ';

                $mail->send();
                echo "<script>alert('✅ Registro exitoso y correo de bienvenida enviado.'); window.location.href='index.html';</script>";
            } catch (Exception $e) {
                echo "<script>alert('✅ Registro exitoso, pero error al enviar el correo: {$mail->ErrorInfo}'); window.location.href='index.html';</script>";
            }

        } else {
            echo "<script>alert('❌ Error al registrar.'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('❌ Error de base de datos: " . $e->getMessage() . "'); window.history.back();</script>";
    }

    $cnnPDO = null;
} else {
    header("Location: registro.php");
    exit();
}
?>
