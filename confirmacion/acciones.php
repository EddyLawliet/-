<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "parroquia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Eliminar un registro del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == "eliminar") {
    $id = $_POST['id'];

    // Comprobar que el ID no esté vacío
    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM Confirmacion WHERE Id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro.";
        }

        $stmt->close();
    }
    exit();
}

// Guardar o actualizar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $certificador = $_POST['certificador'];
    $libro = $_POST['libro'];
    $pagina = $_POST['pagina'];
    $nro = $_POST['nro'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $nombre = $_POST['nombre'];
    $hij = $_POST['hij'];
    $nombrePadre = $_POST['nombrePadre'];
    $nombreMadre = $_POST['nombreMadre'];
    $fechaConfirmacion = $_POST['fechaConfirmacion'];
    $confirmador = $_POST['confirmador'];
    $nombrePadrinoMadrina = $_POST['nombrePadrinoMadrina'];
    $padrinoMadrina1 = $_POST['padrinoMadrina1'];
    $padrinoMadrina2 = $_POST['padrinoMadrina2'];
    $iglesia = $_POST['iglesia'];
    $notasMarginales = $_POST['notasMarginales'];
    $fechaExpedida = $_POST['fechaExpedida'];

    $action = $_POST['action'];

    // Verificar si se está actualizando o insertando
    if ($action == 'actualizar' && !empty($id)) {
        // Actualizar registro existente
        $stmt = $conn->prepare("UPDATE confirmacion SET Certificador=?, Libro=?, Pagina=?, Nro=?, ApellidoPaterno=?, ApellidoMaterno=?, Nombre=?, Hij=?, NombrePadre=?, NombreMadre=?, FechaConfirmacion=?, Confirmador=?, NombrePadrinoMadrina=?, PadrinoMadrina1=?, PadrinoMadrina2=?, Iglesia=?, NotasMarginales=?, FechaExpedida=? WHERE Id=?");
        $stmt->bind_param("ssssssssssssssssssi", $certificador, $libro, $pagina, $nro, $apellidoPaterno, $apellidoMaterno, $nombre, $hij, $nombrePadre, $nombreMadre, $fechaConfirmacion, $confirmador, $nombrePadrinoMadrina, $padrinoMadrina1, $padrinoMadrina2, $iglesia, $notasMarginales, $fechaExpedida, $id);
    } elseif ($action == 'insertar') {
        // Insertar nuevo registro
        $stmt = $conn->prepare("INSERT INTO confirmacion (Certificador, Libro, Pagina, Nro, ApellidoPaterno, ApellidoMaterno, Nombre, Hij, NombrePadre, NombreMadre, FechaConfirmacion, Confirmador, NombrePadrinoMadrina, PadrinoMadrina1, PadrinoMadrina2, Iglesia, NotasMarginales, FechaExpedida) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssss", $certificador, $libro, $pagina, $nro, $apellidoPaterno, $apellidoMaterno, $nombre, $hij, $nombrePadre, $nombreMadre, $fechaConfirmacion, $confirmador, $nombrePadrinoMadrina, $padrinoMadrina1, $padrinoMadrina2, $iglesia, $notasMarginales, $fechaExpedida);
    }
    $stmt->execute();
    $stmt->close();
}

// Obtener datos para la tabla
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $conn->query("SELECT * FROM confirmacion");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Id']}</td>";
        echo "<td>{$row['ApellidoPaterno']}</td>";
        echo "<td>{$row['ApellidoMaterno']}</td>";
        echo "<td>{$row['Nombre']}</td>";
        echo "<td>{$row['Hij']}</td>";
        echo "<td>{$row['NombrePadre']}</td>";
        echo "<td>{$row['NombreMadre']}</td>";
        echo "<td>{$row['FechaConfirmacion']}</td>";
        echo "<td>{$row['Confirmador']}</td>";
        echo "<td>{$row['NombrePadrinoMadrina']}</td>";
        echo "<td>{$row['PadrinoMadrina1']}</td>";
        echo "<td>{$row['PadrinoMadrina2']}</td>";
        echo "<td>{$row['Certificador']}</td>";
        echo "<td>{$row['Libro']}</td>";
        echo "<td>{$row['Pagina']}</td>";
        echo "<td>{$row['Nro']}</td>";
        echo "<td>{$row['Iglesia']}</td>";
        echo "<td>{$row['NotasMarginales']}</td>";
        echo "<td>{$row['FechaExpedida']}</td>";
        echo "<td><button class='btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button></td>";
        echo "<td><input type='checkbox' class='seleccionarRegistro' value='" . $row['Id'] . "'></td>";
        echo "</tr>";
    }
}
$conn->close();
?>
