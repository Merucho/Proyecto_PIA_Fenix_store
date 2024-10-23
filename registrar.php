<?php
include('conexion.php'); // Asegúrate de que este archivo existe
echo "Conexión exitosa"; // Verifica si se muestra esto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Método POST recibido"; // Verifica si se llega a este punto

    // Obtén los datos del formulario
    $nombre = $_POST['nombre']; // Cambiado de validationDefault01 a nombre
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];

    // Validar que las contraseñas coincidan
    if ($contraseña !== $confirmar_contraseña) {
        echo "Las contraseñas no coinciden.";
        exit; // Termina el script si las contraseñas no coinciden
    }

    // Encriptar la contraseña
    $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $contraseña);

    if ($stmt->execute()) {
        // Iniciar sesión y establecer un mensaje
        session_start();
        $_SESSION['mensaje'] = "Registro exitoso"; // Establece el mensaje
        // Redirigir a la página de confirmación
        header("Location: pagina_confirmacion.php"); // Cambia a la página que quieras mostrar
        exit; // Termina el script aquí
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
