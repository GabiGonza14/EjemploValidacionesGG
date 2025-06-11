<?php
session_start();

$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$phone = trim($_POST['phone']);
$captcha_input = trim($_POST['captcha']);

// Validación del lado del servidor
$errors = [];

if (!$name || !$email || !$phone || !$captcha_input) {
    $errors[] = "Todos los campos son obligatorios.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Correo electrónico no válido.";
}

if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
    $errors[] = "Formato de teléfono incorrecto.";
}

if ((int)$captcha_input !== $_SESSION['captcha']) {
    $errors[] = "Respuesta de CAPTCHA incorrecta.";
}

if (!empty($errors)) {
    echo "<div class='text-red-500'>" . implode("<br>", $errors) . "</div>";
} else {
    echo "Formulario enviado correctamente. ¡Gracias!";
}
?>