
<?php
// Database connection
$conectador = mysqli_connect("localhost", "root", "", "parroquia");
if (!$conectador) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize search input
function sanitizeInput($input) {
    global $conectador;
    return mysqli_real_escape_string($conectador, trim($input));
}

// Get search term
$txtBus = isset($_POST["txtBus"]) ? sanitizeInput($_POST["txtBus"]) : '';

// SQL query
$sql = "SELECT * FROM bautismo WHERE 
        ApellidoPaterno LIKE '%$txtBus%' OR 
        ApellidoMaterno LIKE '%$txtBus%' OR 
        Nombre LIKE '%$txtBus%'";
$resultado = mysqli_query($conectador, $sql);

// Generate table rows
while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "<td>
            <a href='editar.php?id={$row['Id']}' class='btn btn-primary btn-sm'>Editar</a>
            <a href='eliminar.php?id={$row['Id']}' class='btn btn-danger btn-sm' 
               onclick='return confirm(\"¿Está seguro de eliminar este registro?\")'>Eliminar</a>
          </td>";
    echo "</tr>";
}
?>
<!-- 
< ?php
// Database connection
$conectador = mysqli_connect("localhost", "root", "", "parroquia");
if (!$conectador) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize search input
function sanitizeInput($input) {
    global $conectador;
    return mysqli_real_escape_string($conectador, trim($input));
}

// Get search term
$txtBus = isset($_POST["txtBus"]) ? sanitizeInput($_POST["txtBus"]) : '';

// SQL query
$sql = "SELECT * FROM bautismo WHERE 
        ApellidoPaterno LIKE '%$txtBus%' OR 
        ApellidoMaterno LIKE '%$txtBus%' OR 
        Nombre LIKE '%$txtBus%'";
$resultado = mysqli_query($conectador, $sql);

// Generate table rows
while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "<td>
            <a href='editar.php?id={$row['Id']}' class='btn btn-primary btn-sm'>Editar</a>
            <a href='eliminar.php?id={$row['Id']}' class='btn btn-danger btn-sm' 
               onclick='return confirm(\"¿Está seguro de eliminar este registro?\")'>Eliminar</a>
          </td>";
    echo "</tr>";
}
?> -->