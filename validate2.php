<?php
session_start();
include_once("ClaseValidacion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validator = new FormValidator($_POST);
    $validator->setRequiredFields(['name', 'email', 'phone']);

    try {
        $validator->validate();

        // Validar reCAPTCHA
        $secretKey = "6LfBTmIrAAAAAFprI-whXJ6pw_8UrzSPYxM3xHUp"; // clave secreta de prueba
        $response = $_POST['g-recaptcha-response'] ?? '';
        $remoteIp = $_SERVER['REMOTE_ADDR'];

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $response,
            'remoteip' => $remoteIp
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if (!$captcha_success->success) {
            throw new Exception("Verificación de reCAPTCHA fallida.");
        }

        // Si todo OK
        echo "<p style='color:green;'>Formulario enviado correctamente.</p>";

    } catch (Exception $e) {
        // Solo el mensaje sin div, porque ya está en el HTML
        echo "<p>{$e->getMessage()}</p>";
    }
}
?>
