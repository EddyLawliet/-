<?php
include 'conexion.php';

// Eliminar un registro del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "eliminar") {
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
    } else {
        echo "ID inválido.";
    }
    $conn->close();
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
    $conn->close();
}

?>
