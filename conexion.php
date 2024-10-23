<?php
// conexion.php

$host = 'localhost'; // Cambia esto si tu servidor de base de datos es diferente
$user = 'root';      // Cambia esto si has configurado un usuario diferente
$password = '';      // Cambia esto si tienes una contraseña para el usuario
$dbname = 'base_de_datos'; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
