<?php
include 'conexion.php';

// Eliminar un registro del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "eliminar") {
    $id = $_POST['id'];

    // Comprobar que el ID no esté vacío
    if (!empty($id)) {
        // Preparar y ejecutar la consulta de eliminación
        $stmt = $conn->prepare("DELETE FROM Bautismo WHERE Id = ?");
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
    // Obtener los valores del formulario
    $id = $_POST['id']; 
    $iglesia = $_POST['iglesia'];
    $presbítero = $_POST['presbítero'];
    $libroB = $_POST['libroB'];
    $paginaB = $_POST['paginaB'];
    $partidaB = $_POST['partidaB'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $nombre = $_POST['nombre'];
    $lugarBautismo = $_POST['lugarBautismo'];
    $fechaBautismo = $_POST['fechaBautismo'];
    $lugarNacimiento = $_POST['lugarNacimiento'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $padre = $_POST['padre'];
    $madre = $_POST['madre'];
    $padrino = $_POST['padrino'];
    $madrina = $_POST['madrina'];
    $oficialiaRegistroCivil = $_POST['oficialiaRegistroCivil'];
    $libro = $_POST['libro'];
    $partida = $_POST['partida'];
    $certifica = $_POST['certifica'];
    $notasMarginales = $_POST['notasMarginales'];
    $lugarExpedido = $_POST['lugarExpedido'];
    $fechaExpedida = $_POST['fechaExpedida'];

    $action = $_POST['action'];

    // Verificar si se está actualizando o insertando
    if ($action == 'actualizar' && !empty($id)) {
        // Actualizar registro existente
        $stmt = $conn->prepare("UPDATE Bautismo SET Iglesia=?, Presbítero=?, LibroB=?, PaginaB=?, PartidaB=?, ApellidoPaterno=?, ApellidoMaterno=?, Nombre=?, LugarBautismo=?, FechaBautismo=?, LugarNacimiento=?, FechaNacimiento=?, Padre=?, Madre=?, Padrino=?, Madrina=?, OficialiaRegistroCivil=?, Libro=?, Partida=?, Certifica=?, NotasMarginales=?, LugarExpedido=?, FechaExpedida=? WHERE Id=?");
        $stmt->bind_param("sssssssssssssssssssssssi", $iglesia, $presbítero, $libroB, $paginaB, $partidaB, $apellidoPaterno, $apellidoMaterno, $nombre, $lugarBautismo, $fechaBautismo, $lugarNacimiento, $fechaNacimiento, $padre, $madre, $padrino, $madrina, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida, $id);
    } elseif ($action == 'insertar') {
        // Insertar nuevo registro
        $stmt = $conn->prepare("INSERT INTO Bautismo (Iglesia, Presbítero, LibroB, PaginaB, PartidaB, ApellidoPaterno, ApellidoMaterno, Nombre, LugarBautismo, FechaBautismo, LugarNacimiento, FechaNacimiento, Padre, Madre, Padrino, Madrina, OficialiaRegistroCivil, Libro, Partida, Certifica, NotasMarginales, LugarExpedido, FechaExpedida) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssssssss", $iglesia, $presbítero, $libroB, $paginaB, $partidaB, $apellidoPaterno, $apellidoMaterno, $nombre, $lugarBautismo, $fechaBautismo, $lugarNacimiento, $fechaNacimiento, $padre, $madre, $padrino, $madrina, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida);
    }

    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
