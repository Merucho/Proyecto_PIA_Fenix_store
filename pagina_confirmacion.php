<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verifica si hay un mensaje de registro en la sesión
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    // Limpiar el mensaje de la sesión después de usarlo
    unset($_SESSION['mensaje']);
} else {
    // Redirigir a la página de registro si no hay mensaje
    header("Location: log.html");
    exit;
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Asegúrate de tener este archivo CSS -->
    <link rel="stylesheet" href="css/style.css"> <!-- Tu archivo CSS adicional -->
    <title>Confirmación de Registro</title>
</head>

<body>
    <div class="container text-center mt-5">
        <h1>¡Registro Exitoso!</h1>
        <p><?php echo $mensaje; ?></p>
        <a href="cuenta.html" class="btn btn-primary">Ir a mi cuenta</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
