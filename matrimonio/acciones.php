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
        $stmt = $conn->prepare("DELETE FROM Matrimonio WHERE Id = ?");
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
    $iglesia = $_POST['iglesia'];
    $presbítero = $_POST['presbítero'];
    $libroM = $_POST['libroM'];
    $paginaM = $_POST['paginaM'];
    $partidaM = $_POST['partidaM'];
    $lugarMatrimonio = $_POST['lugarMatrimonio'];
    $fechaMatrimonio = $_POST['fechaMatrimonio'];
    $apellidoNombreEsposo = $_POST['apellidoNombreEsposo'];
    $bautizadoParroquiaEsposo = $_POST['bautizadoParroquiaEsposo'];
    $padreEsposo = $_POST['padreEsposo'];
    $madreEsposo = $_POST['madreEsposo'];
    $apellidoNombreEsposa = $_POST['apellidoNombreEsposa'];
    $bautizadaParroquiaEsposa = $_POST['bautizadaParroquiaEsposa'];
    $padreEsposa = $_POST['padreEsposa'];
    $madreEsposa = $_POST['madreEsposa'];
    $padrino = $_POST['padrino'];
    $madrina = $_POST['madrina'];
    $lugarMatrimonioCivil = $_POST['lugarMatrimonioCivil'];
    $fechaMatrimonioCivil = $_POST['fechaMatrimonioCivil'];
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
        $stmt = $conn->prepare("UPDATE Matrimonio SET Iglesia=?, Presbítero=?, LibroM=?, PaginaM=?, PartidaM=?, LugarMatrimonio=?, FechaMatrimonio=?, ApellidoNombreEsposo=?, BautizadoParroquiaEsposo=?, PadreEsposo=?, MadreEsposo=?, ApellidoNombreEsposa=?, BautizadaParroquiaEsposa=?, PadreEsposa=?, MadreEsposa=?, Padrino=?, Madrina=?, LugarMatrimonioCivil=?, FechaMatrimonioCivil=?, OficialiaRegistroCivil=?, Libro=?, Partida=?, Certifica=?, NotasMarginales=?, LugarExpedido=?, FechaExpedida=? WHERE Id=?");
        $stmt->bind_param("ssssssssssssssssssssssssssi", $iglesia, $presbítero, $libroM, $paginaM, $partidaM, $lugarMatrimonio, $fechaMatrimonio, $apellidoNombreEsposo, $bautizadoParroquiaEsposo, $padreEsposo, $madreEsposo, $apellidoNombreEsposa, $bautizadaParroquiaEsposa, $padreEsposa, $madreEsposa, $padrino, $madrina, $lugarMatrimonioCivil, $fechaMatrimonioCivil, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida, $id);
    } elseif ($action == 'insertar') {
        // Insertar nuevo registro
        $stmt = $conn->prepare("INSERT INTO Matrimonio (Iglesia, Presbítero, LibroM, PaginaM, PartidaM, LugarMatrimonio, FechaMatrimonio, ApellidoNombreEsposo, BautizadoParroquiaEsposo, PadreEsposo, MadreEsposo, ApellidoNombreEsposa, BautizadaParroquiaEsposa, PadreEsposa, MadreEsposa, Padrino, Madrina, LugarMatrimonioCivil, FechaMatrimonioCivil, OficialiaRegistroCivil, Libro, Partida, Certifica, NotasMarginales, LugarExpedido, FechaExpedida) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssssssssssss", $iglesia, $presbítero, $libroM, $paginaM, $partidaM, $lugarMatrimonio, $fechaMatrimonio, $apellidoNombreEsposo, $bautizadoParroquiaEsposo, $padreEsposo, $madreEsposo, $apellidoNombreEsposa, $bautizadaParroquiaEsposa, $padreEsposa, $madreEsposa, $padrino, $madrina, $lugarMatrimonioCivil, $fechaMatrimonioCivil, $oficialiaRegistroCivil, $libro, $partida, $certifica, $notasMarginales, $lugarExpedido, $fechaExpedida);
    }

    $stmt->execute();
    $stmt->close();
}

// Obtener datos para la tabla
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $conn->query("SELECT * FROM Matrimonio");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Id']}</td>";
        echo "<td>{$row['ApellidoNombreEsposo']}</td>";
        echo "<td>{$row['ApellidoNombreEsposa']}</td>";
        echo "<td>{$row['LugarMatrimonio']}</td>";
        echo "<td>{$row['FechaMatrimonio']}</td>";
        echo "<td>{$row['BautizadoParroquiaEsposo']}</td>";
        echo "<td>{$row['BautizadaParroquiaEsposa']}</td>";
        echo "<td>{$row['PadreEsposo']}</td>";
        echo "<td>{$row['MadreEsposo']}</td>";
        echo "<td>{$row['PadreEsposa']}</td>";
        echo "<td>{$row['MadreEsposa']}</td>";
        echo "<td>{$row['Padrino']}</td>";
        echo "<td>{$row['Madrina']}</td>";
        echo "<td>{$row['Iglesia']}</td>";
        echo "<td>{$row['Presbítero']}</td>";
        echo "<td>{$row['LibroM']}</td>";
        echo "<td>{$row['PaginaM']}</td>";
        echo "<td>{$row['PartidaM']}</td>";
        echo "<td>{$row['LugarMatrimonioCivil']}</td>";
        echo "<td>{$row['FechaMatrimonioCivil']}</td>";
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
?>
