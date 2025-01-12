<?php
$pagina = "bautismo";
include "../header.php";
// Database connection
$conectador = mysqli_connect("localhost", "root", "", "parroquia");
if (!$conectador) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize search input
function sanitizeInput($input)
{
    global $conectador;
    return mysqli_real_escape_string($conectador, trim($input));
}

// Get search term
$txtBus = isset($_POST["txtBus"]) ? sanitizeInput($_POST["txtBus"]) : '';

// Build SQL query
$sql = "SELECT * FROM bautismo WHERE 
        ApellidoPaterno LIKE '%$txtBus%' OR 
        ApellidoMaterno LIKE '%$txtBus%' OR 
        Nombre LIKE '%$txtBus%'";
$resultado = mysqli_query($conectador, $sql);
?>

<div class="container">
    <div class="form-group"></div>
    <input type="text" class="form-control" name="txtBus" id="txtBus" placeholder="Buscar por Apellido o Nombre">
</div>

<table class="table table-striped">
    <caption>Registro de Bautismos</caption>
    <thead>
        <tr>
            <?php
            $headers = [
                'Id',
                'Presbítero',
                'Apellido Paterno',
                'Apellido Materno',
                'Nombre',
                'Iglesia',
                'Parroquia',
                'Lugar Bautismo',
                'Fecha Bautismo',
                'Lugar Nacimiento',
                'Fecha Nacimiento',
                'Padre',
                'Madre',
                'Padrino',
                'Madrina',
                'Oficialía Registro Civil',
                'Libro',
                'Página',
                'Partida',
                'Notas Marginales',
                'Fecha Expedida'
            ];
            foreach ($headers as $header) {
                echo "<th>$header</th>";
            }
            ?>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="resultadosBusqueda">
        <?php
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
    </tbody>
</table>
</div>

<script>
    document.getElementById('txtBus').addEventListener('input', function() {
        performSearch();
    });

    function performSearch() {
        const busqueda = document.getElementById('txtBus').value;

        const formData = new FormData();
        formData.append('txtBus', busqueda);

        fetch('buscar_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('resultadosBusqueda').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>