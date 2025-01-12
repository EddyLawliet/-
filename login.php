<?php

include 'conexion.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE Usuario='$usuario' AND Contrasena='$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: inicio.html");
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos";
}

$conn->close();
?>
