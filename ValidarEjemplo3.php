<?php
session_start();
// Generar números aleatorios para CAPTCHA
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$_SESSION['captcha'] = $num1 + $num2;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación con Fetch</title>
    <script src="form-handler.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Formulario de Contacto</h2>
    
    <form id="contactForm" action="process.php" method="POST" class="space-y-4">
        <div>
            <label class="block mb-1">Nombre:</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1">Correo Electrónico:</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1">Teléfono (123-456-7890):</label>
            <input type="text" name="phone" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block mb-1">¿Cuánto es <?= $num1 ?> + <?= $num2 ?>?</label>
            <input type="text" name="captcha" class="w-full p-2 border rounded" required>
        </div>

        <div id="errors" class="text-red-500"></div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
    </form>

    <div id="response" class="mt-4 text-green-600 font-semibold"></div>
</div>

</body>
</html>
