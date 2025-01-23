<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'conexion.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE Usuario='$usuario' AND Contrasena='$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $usuario; // Almacena el nombre de usuario en una variable de sesión
    header("Location: inicio.html");
    exit(); 
} else {
    echo "Usuario o contraseña incorrectos";
}

$conn->close();
/* Estas líneas de código en PHP están configurando la forma en que se manejan y muestran los errores en tu aplicación. Aquí tienes una explicación detallada de cada línea:

    ```php
    ini_set('display_errors', 1);
    ```
    Esta línea habilita la visualización de errores en la salida estándar (por ejemplo, en el navegador web). `1` significa que está activado. Esto es útil durante el desarrollo para ver los errores directamente en la página.
    
    ```php
    ini_set('display_startup_errors', 1);
    ```
    Esta línea habilita la visualización de errores que ocurren durante el inicio de PHP. Al igual que la línea anterior, `1` significa que está activado. Esto es útil para detectar problemas que ocurren antes de que tu script comience a ejecutarse.
    
    ```php
    error_reporting(E_ALL);
    ```
    Esta línea establece el nivel de reporte de errores a `E_ALL`, lo que significa que todos los errores y advertencias serán reportados. Esto incluye errores de tiempo de ejecución, advertencias, y notificaciones.
    
    En resumen, estas configuraciones son muy útiles durante el desarrollo para identificar y corregir errores en tu código. Sin embargo, es recomendable desactivarlas en un entorno de producción para evitar que los usuarios vean mensajes de error que podrían contener información sensible. */
?>
