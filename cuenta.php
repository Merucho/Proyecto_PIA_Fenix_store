<?php
session_start(); // Iniciar la sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: log.html"); // Redirigir si no está autenticado
    exit();
}
?>

<!doctype html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@500&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/logo.jpeg">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Mi Cuenta</title>
</head>

<body>

    <div class="container">
        <header>
            <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
            <a href="logout.php">Cerrar sesión</a> <!-- Opción para cerrar sesión -->
        </header>
        <!-- Contenido de la cuenta aquí -->
    </div>

</body>
</html>
