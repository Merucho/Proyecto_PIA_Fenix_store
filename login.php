<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $conn = new mysqli("localhost", "root", "", "base_de_datos");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT nombre FROM usuarios WHERE correo = ? AND contraseña = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $correo, $contraseña);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($nombreUsuario);
            $stmt->fetch();

            $_SESSION['nombreUsuario'] = $nombreUsuario;

            header("Location: cuenta.html");
            exit();
        } else {
            // Enviar un parámetro en la URL para indicar que hubo un error
            header("Location: log.html?error=1");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: log.html?error=2");
        exit();
    }
}
?>
