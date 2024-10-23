<?php
session_start();
session_destroy(); // Destruir la sesión
header("Location: log.html"); // Redirigir al formulario de inicio de sesión
exit();
?>
