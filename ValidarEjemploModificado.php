<?php session_start(); ?>
<!DOCTYPE html> 
<html>
<head>
    <title>Validaciones</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- reCAPTCHA -->
</head>
<body>
<div class="form-container">
<h2>Ejemplos de Validaciones</h2>
<form id="contactForm" method="post" action="validate2.php">
    Nombre: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Teléfono: <input type="text" name="phone" placeholder="123-456-7890"><br><br>

    <!-- reCAPTCHA con clave de prueba para localhost -->
    <div class="g-recaptcha" data-sitekey="6LfBTmIrAAAAANDwMUbb59us-7mgvFoPLpbENTqK"></div>
    <br>

    <input type="submit" name="submit" value="Enviar">
</form>

<div id="errors" style="color:red; margin-top: 10px;"></div>
<div id="response"></div>

<script src="form-handler.js"></script>
</div>
</body>
</html>
