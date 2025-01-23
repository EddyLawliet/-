<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
=======
    <link rel="stylesheet" href="../style/estilo.css">
>>>>>>> 49a3c186a6ac46038411f92e4c7a84cce39f13de
    <title>REGISTRO DE CONFIRMACION</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <style>
        .mensaje { color: green; display: none; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000000; padding: 8px; text-align: left; cursor: pointer; }
        th { background-color: dark; }
    </style>
</head>

<body>
    <?php
    $pagina = "confirmacion";
    /* include "../header.php"; */
    ?>

    <div class="form-table-container">
        <div class="form-container">
            <h2>Registro de Confirmación</h2>
            <form id="confirmacionForm" action="acciones.php" method="POST">
                <input type="hidden" id="id" name="id"> <!-- Campo oculto para el ID -->

                <label for="libro">Libro:</label>
                <input type="text" id="libro" name="libro" required>

                <label for="pagina">Página:</label>
                <input type="text" id="pagina" name="pagina" required>

                <label for="nro">Nro:</label>
                <input type="text" id="nro" name="nro" required>

                <label for="certificador">Certificador:</label>
                <input type="text" id="certificador" name="certificador">

                <div class="section">
                    <h3>DATOS DEL CONFIRMADO</h3><br>

                    <label for="apellidoPaterno">Apellido Paterno:</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>

                    <label for="apellidoMaterno">Apellido Materno:</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>

                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="hij">Hijo(a):</label>
                    <input type="text" id="hij" name="hij">

                    <label for="nombrePadre">Nombre del Padre:</label>
                    <input type="text" id="nombrePadre" name="nombrePadre" required>

                    <label for="nombreMadre">Nombre de la Madre:</label>
                    <input type="text" id="nombreMadre" name="nombreMadre" required>

                    <label for="fechaConfirmacion">Fecha de Confirmación:</label>
                    <input type="date" id="fechaConfirmacion" name="fechaConfirmacion" required>

                    <label for="confirmador">Confirmador:</label>
                    <input type="text" id="confirmador" name="confirmador" required>

                    <label for="nombrePadrinoMadrina">Nombre del Padrino/Madrina:</label>
                    <input type="text" id="nombrePadrinoMadrina" name="nombrePadrinoMadrina"><br><br>
                    
                    <div>
                        <input type="text" id="padrinoMadrina1" name="padrinoMadrina1" placeholder="escriba P o M">
                        <label for="padrinoMadrina2">adrin</label>
                        <input type="text" id="padrinoMadrina2" name="padrinoMadrina2" placeholder="escriba O o A">
                    </div>

                    <label for="iglesia">Iglesia:</label>
                    <input type="text" id="iglesia" name="iglesia" required>
                </div>

                <div class="section">
                    <h3>OTROS</h3><br>

                    <label for="notasMarginales">Notas Marginales:</label>
                    <textarea id="notasMarginales" name="notasMarginales" required></textarea>

                    <label for="fechaExpedida">Fecha Expedida:</label>
                    <input type="date" id="fechaExpedida" name="fechaExpedida"><br><br>
                </div>
                <div class="form-buttons">
                    <!-- Button trigger modal -->
                    <button id="modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        GUARDAR
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">¿LOS DATOS A GUARDAR SON LOS CORRECTOS?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Certificador: <span style="margin-left: 20px;" id="certificadorModal"></span></p>
                                    <p>Libro: <span style="margin-left: 20px;" id="libroModal"></span></p>
                                    <p>Página: <span style="margin-left: 20px;" id="paginaModal"></span></p>
                                    <p>Número: <span style="margin-left: 20px;" id="nroModal"></span></p>
                                    <p>Apellido Paterno: <span style="margin-left: 20px;" id="apellidoPaternoModal"></span></p>
                                    <p>Apellido Materno: <span style="margin-left: 20px;" id="apellidoMaternoModal"></span></p>
                                    <p>Nombre: <span style="margin-left: 20px;" id="nombreModal"></span></p>
                                    <p>Hijo: <span style="margin-left: 20px;" id="hijModal"></span></p>
                                    <p>Nombre del Padre: <span style="margin-left: 20px;" id="nombrePadreModal"></span></p>
                                    <p>Nombre de la Madre: <span style="margin-left: 20px;" id="nombreMadreModal"></span></p>
                                    <p>Fecha de Confirmación: <span style="margin-left: 20px;" id="fechaConfirmacionModal"></span></p>
                                    <p>Confirmador: <span style="margin-left: 20px;" id="confirmadorModal"></span></p>
                                    <p>Nombre Padrino/Madrina: <span style="margin-left: 20px;" id="nombrePadrinoMadrinaModal"></span></p>
                                    <p>Padrino 1: <span style="margin-left: 20px;" id="padrinoMadrina1Modal"></span></p>
                                    <p>Padrino 2: <span style="margin-left: 20px;" id="padrinoMadrina2Modal"></span></p>
                                    <p>Iglesia: <span style="margin-left: 20px;" id="iglesiaModal"></span></p>
                                    <p>Notas Marginales: <span style="margin-left: 20px;" id="notasMarginalesModal"></span></p>
                                    <p>Fecha Expedida: <span style="margin-left: 20px;" id="fechaExpedidaModal"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="insertarBtn">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="actualizarBtn">Modificar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                </div>

            </form>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Datos completos</button>
        </div>


        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">REGISTRO DE CONFIRMACIÓN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="buscar" class="table-container">
                            <div class="form-search">
                                <label for="search">Buscar:</label>
                                <input type="text" id="search" name="search" placeholder="Buscar por datos">
                                <br><br>
                            </div>
                            <table id="confirmacionTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombre</th>
                                        <th>Hijo(a)</th>
                                        <th>Nombre del Padre</th>
                                        <th>Nombre de la Madre</th>
                                        <th>Fecha de Confirmación</th>
                                        <th>Confirmador</th>
                                        <th>Nombre del Padrino/Madrina</th>
                                        <th>Es Padrino?</th>
                                        <th>Es Madrina?</th>
                                        <th>Certificador</th>
                                        <th>Libro</th>
                                        <th>Página</th>
                                        <th>Nro</th>
                                        <th>Iglesia</th>
                                        <th>Notas Marginales</th>
                                        <th>Fecha Expedida</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include 'conexion.php';
                                $sql = "SELECT * FROM confirmacion";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Id'] . "</td>";
                                        echo "<td>" . $row['ApellidoPaterno'] . "</td>";
                                        echo "<td>" . $row['ApellidoMaterno'] . "</td>";
                                        echo "<td>" . $row['Nombre'] . "</td>";
                                        echo "<td>" . $row['Hij'] . "</td>";
                                        echo "<td>" . $row['NombrePadre'] . "</td>";
                                        echo "<td>" . $row['NombreMadre'] . "</td>";
                                        echo "<td>" . $row['FechaConfirmacion'] . "</td>";
                                        echo "<td>" . $row['Confirmador'] . "</td>";
                                        echo "<td>" . $row['NombrePadrinoMadrina'] . "</td>";
                                        echo "<td>" . $row['PadrinoMadrina1'] . "</td>";
                                        echo "<td>" . $row['PadrinoMadrina2'] . "</td>";
                                        echo "<td>" . $row['Certificador'] . "</td>";
                                        echo "<td>" . $row['Libro'] . "</td>";
                                        echo "<td>" . $row['Pagina'] . "</td>";
                                        echo "<td>" . $row['Nro'] . "</td>";
                                        echo "<td>" . $row['Iglesia'] . "</td>";
                                        echo "<td>" . $row['NotasMarginales'] . "</td>";
                                        echo "<td>" . $row['FechaExpedida'] . "</td>";
                                        echo "<td>
                                            <button class='btn btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button>
                                            <button class='btn btn-pdf' onclick=\"window.open('PrintConfirmacion.php?id=" . $row['Id'] . "', '_blank');\">PDF</button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='20'>No hay datos disponibles</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="buscar" class="tabla">
            <div class="form-search">
                <label for="search2">Buscar:</label>
                <input type="text" id="search2" name="search2" placeholder="Buscar por datos">
                <br>
                <br>
            </div>
            <table id="confirmacionTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conexion.php';

                        // Consulta SQL para obtener todos los datos de la tabla matrimonio
                        $sql = "SELECT * FROM confirmacion";
                        $result = $conn->query($sql);

                        // Verificar si hay resultados
                        if ($result->num_rows > 0) {
                            // Recorrer y mostrar cada fila de la tabla
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Id'] . "</td>";
                                echo "<td>" . $row['ApellidoPaterno'] . "</td>";
                                echo "<td>" . $row['ApellidoMaterno'] . "</td>";
                                echo "<td>" . $row['Nombre'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No hay datos disponibles</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>



</html>
