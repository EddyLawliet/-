<?php
<<<<<<< HEAD
include 'conexion.php';
=======

include '../conexion.php';

/* $servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "parroquia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
 */
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
>>>>>>> 49a3c186a6ac46038411f92e4c7a84cce39f13de

// Eliminar un registro del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == "eliminar") {
    $id = $_POST['id'];
    // Comprobar que el ID no esté vacío
    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM bautismo WHERE Id = ?");
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
    $iglesia = $_POST['iglesia'];
    $Presbitero = $_POST['Presbitero'];
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
        $stmt = $conn->prepare("UPDATE bautismo SET Iglesia=?, Presbitero=?, LibroB=?, PaginaB=?, PartidaB=?, ApellidoPaterno=?, ApellidoMaterno=?, Nombre=?, LugarBautismo=?, FechaBautismo=?, LugarNacimiento=?, FechaNacimiento=?, Padre=?, Madre=?, Padrino=?, Madrina=?, OficialiaRegistroCivil=?, Libro=?, Partida=?, Certifica=?, NotasMarginales=?, LugarExpedido=?, FechaExpedida=? WHERE Id=?");
        $stmt->bind_param("sssssssssssssssssssssssi", $iglesia, $Presbitero, $libroB, $paginaB, $partidaB, $apellidoPaterno, $apellidoMaterno, $nombre, $lugarBautismo, $fechaBautismo, $lugarNacimiento, $fechaNacimiento, $padre, $madre, $padrino, $madrina, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida, $id);
    } elseif ($action == 'insertar') {
        // Insertar nuevo registro
        $stmt = $conn->prepare("INSERT INTO bautismo (Iglesia, Presbitero, LibroB, PaginaB, PartidaB, ApellidoPaterno, ApellidoMaterno, Nombre, LugarBautismo, FechaBautismo, LugarNacimiento, FechaNacimiento, Padre, Madre, Padrino, Madrina, OficialiaRegistroCivil, Libro, Partida, Certifica, NotasMarginales, LugarExpedido, FechaExpedida) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssssssss", $iglesia, $Presbitero, $libroB, $paginaB, $partidaB, $apellidoPaterno, $apellidoMaterno, $nombre, $lugarBautismo, $fechaBautismo, $lugarNacimiento, $fechaNacimiento, $padre, $madre, $padrino, $madrina, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida);
    }

    $stmt->execute();
    $stmt->close();
    $conn->close();
}
<<<<<<< HEAD
=======


// Obtener datos para la tabla
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $conn->query("SELECT * FROM bautismo");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Id']}</td>";
        echo "<td>{$row['Iglesia']}</td>";
        echo "<td>{$row['Presbitero']}</td>";
        echo "<td>{$row['LibroB']}</td>";
        echo "<td>{$row['PaginaB']}</td>";
        echo "<td>{$row['PartidaB']}</td>";
        echo "<td>{$row['ApellidoPaterno']}</td>";
        echo "<td>{$row['ApellidoMaterno']}</td>";
        echo "<td>{$row['Nombre']}</td>";
        echo "<td>{$row['LugarBautismo']}</td>";
        echo "<td>{$row['FechaBautismo']}</td>";
        echo "<td>{$row['LugarNacimiento']}</td>";
        echo "<td>{$row['FechaNacimiento']}</td>";
        echo "<td>{$row['Padre']}</td>";
        echo "<td>{$row['Madre']}</td>";
        echo "<td>{$row['Padrino']}</td>";
        echo "<td>{$row['Madrina']}</td>";
        echo "<td>{$row['OficialiaRegistroCivil']}</td>";
        echo "<td>{$row['Libro']}</td>";
        echo "<td>{$row['Partida']}</td>";
        echo "<td>{$row['Certifica']}</td>";
        echo "<td>{$row['NotasMarginales']}</td>";
        echo "<td>{$row['LugarExpedido']}</td>";
        echo "<td>{$row['FechaExpedida']}</td>";
        echo "<td><button class='btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button></td>";
        echo "<td><input type='checkbox' class='seleccionarRegistro' value='" . $row['Id'] . "'></td>";

        echo "</tr>";
    }
}

$conn->close();
>>>>>>> 49a3c186a6ac46038411f92e4c7a84cce39f13de
?>
