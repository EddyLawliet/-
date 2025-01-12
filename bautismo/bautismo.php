
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu propio CSS -->
    <link rel="stylesheet" href="estilos.css">
    <title>REGISTRO DE BAUTISOS</title>
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
    $pagina = "bautismo";
    ?>

    <div class="form-table-container">
        <div class="form-container">
            <h2>Registro de Bautismo</h2>
            <form id="bautismoForm" action="acciones.php" method="POST">
                <input type="hidden" id="id" name="id"> <!-- Campo oculto para el ID -->

                <label for="iglesia">Iglesia:</label>
                <input type="text" id="iglesia" name="iglesia" required>

                <label for="presbítero">Presbítero:</label>
                <input type="text" id="presbítero" name="presbítero" required>

                <label for="libroB">Libro Bautismo:</label>
                <input type="text" id="libroB" name="libroB" required>

                <label for="paginaB">Página Bautismo:</label>
                <input type="text" id="paginaB" name="paginaB" required>

                <label for="partidaB">Partida Bautismo:</label>
                <input type="text" id="partidaB" name="partidaB" required>

                <label for="apellidoPaterno">Apellido Paterno:</label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" required>

                <label for="apellidoMaterno">Apellido Materno:</label>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" required>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="lugarBautismo">Lugar de Bautismo:</label>
                <input type="text" id="lugarBautismo" name="lugarBautismo" required>

                <label for="fechaBautismo">Fecha de Bautismo:</label>
                <input type="date" id="fechaBautismo" name="fechaBautismo" required>

                <label for="lugarNacimiento">Lugar de Nacimiento:</label>
                <input type="text" id="lugarNacimiento" name="lugarNacimiento" required>

                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>

                <label for="padre">Padre:</label>
                <input type="text" id="padre" name="padre" required>

                <label for="madre">Madre:</label>
                <input type="text" id="madre" name="madre" required>

                <label for="padrino">Padrino:</label>
                <input type="text" id="padrino" name="padrino" required>

                <label for="madrina">Madrina:</label>
                <input type="text" id="madrina" name="madrina" required>

                <label for="oficialiaRegistroCivil">Oficialía Registro Civil:</label>
                <input type="text" id="oficialiaRegistroCivil" name="oficialiaRegistroCivil" required>

                <label for="libro">Libro:</label>
                <input type="text" id="libro" name="libro" required>

                <label for="partida">Partida:</label>
                <input type="text" id="partida" name="partida" required>

                <label for="certifica">Certifica:</label>
                <input type="text" id="certifica" name="certifica" required>

                <label for="notasMarginales">Notas Marginales:</label><br>
                <textarea id="notasMarginales" name="notasMarginales" required></textarea><br>

                <label for="lugarExpedido">Lugar Expedido:</label>
                <input type="text" id="lugarExpedido" name="lugarExpedido" required>

                <label for="fechaExpedida">Fecha Expedida:</label>
                <input type="date" id="fechaExpedida" name="fechaExpedida" required><br><br>

                <div class="form-buttons">
                    <!-- Button trigger modal -->
                    <button id="modal"type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                    <p>Apellido Paterno: <span style="margin-left: 20px;" id="paternoModal"></span></p>
                                    <p>Apellido Materno: <span style="margin-left: 20px;" id="maternoModal"></span></p>
                                    <p>Nombre: <span style="margin-left: 20px;" id="nombreModal"></span></p>
                                    <p>Lugar Bautismo: <span style="margin-left: 20px;" id="lugarBautismoModal"></span></p>
                                    <p>Fecha Bautismo: <span style="margin-left: 20px;" id="fechaBautismoModal"></span></p>
                                    <p>Lugar Nacimiento: <span style="margin-left: 20px;" id="lugarNacimientoModal"></span></p>
                                    <p>Fecha Nacimiento: <span style="margin-left: 20px;" id="fechaNacimientoModal"></span></p>
                                    <p>Padre: <span style="margin-left: 20px;" id="padreModal"></span></p>
                                    <p>Madre: <span style="margin-left: 20px;" id="madreModal"></span></p>
                                    <p>Padrino: <span style="margin-left: 20px;" id="padrinoModal"></span></p>
                                    <p>Madrina: <span style="margin-left: 20px;" id="madrinaModal"></span></p>
                                    <p>Iglesia: <span style="margin-left: 20px;" id="iglesiaModal"></span></p>
                                    <p>Presbítero: <span style="margin-left: 20px;" id="presbiteroModal"></span></p>
                                    <p>Libro Bautismo: <span style="margin-left: 20px;" id="libroBModal"></span></p>
                                    <p>Página Bautismo: <span style="margin-left: 20px;" id="paginaBModal"></span></p>
                                    <p>Partida Bautismo: <span style="margin-left: 20px;" id="partidaBModal"></span></p>
                                    <p>Oficialía Registro Civil: <span style="margin-left: 20px;" id="oficialiaModal"></span></p>
                                    <p>Libro: <span style="margin-left: 20px;" id="libroModal"></span></p>
                                    <p>Partida: <span style="margin-left: 20px;" id="partidaModal"></span></p>
                                    <p>Certifica: <span style="margin-left: 20px;" id="certificaModal"></span></p>
                                    <p>Notas Marginales: <span style="margin-left: 20px;" id="notasMarginalesModal"></span></p>
                                    <p>Lugar Expedido: <span style="margin-left: 20px;" id="lugarExpedidoModal"></span></p>
                                    <p>Fecha Expedida: <span style="margin-left: 20px;" id="fechaExpedidaModal"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">salir</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="insertarBtn">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="actualizarBtn">Modificar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    
                    
                </div>
            </form>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
        Datos completos
        </button>
        </div>

        <!-- Button trigger modal -->
        

        <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">REGISTRO DE BAUTISMO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="buscar" class="table-container">
                        <div class="form-search">
                            <label for="search">Buscar:</label>
                            <input type="text" id="search" name="search" placeholder="Buscar por datos">
                            <br>
                            <br>
                        </div>
                        <table id="bautismoTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Nombre</th>
                                    <th>Lugar Bautismo</th>
                                    <th>Fecha Bautismo</th>
                                    <th>Lugar Nacimiento</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Padre</th>
                                    <th>Madre</th>
                                    <th>Padrino</th>
                                    <th>Madrina</th>
                                    <th>Iglesia</th>
                                    <th>Presbítero</th>
                                    <th>Libro Bautismo</th>
                                    <th>Página Bautismo</th>
                                    <th>Partida Bautismo</th>
                                    <th>Oficialía Registro Civil</th>
                                    <th>Libro</th>
                                    <th>Partida</th>
                                    <th>Certifica</th>
                                    <th>Notas Marginales</th>
                                    <th>Lugar Expedido</th>
                                    <th>Fecha Expedida</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include 'conexion.php';

                            // Consulta SQL para obtener todos los datos de la tabla bautismo
                            $sql = "SELECT * FROM bautismo";
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
                                        echo "<td>" . $row['LugarBautismo'] . "</td>";
                                        echo "<td>" . $row['FechaBautismo'] . "</td>";
                                        echo "<td>" . $row['LugarNacimiento'] . "</td>";
                                        echo "<td>" . $row['FechaNacimiento'] . "</td>";
                                        echo "<td>" . $row['Padre'] . "</td>";
                                        echo "<td>" . $row['Madre'] . "</td>";
                                        echo "<td>" . $row['Padrino'] . "</td>";
                                        echo "<td>" . $row['Madrina'] . "</td>";
                                        echo "<td>" . $row['Iglesia'] . "</td>";
                                        echo "<td>" . $row['Presbítero'] . "</td>";
                                        echo "<td>" . $row['LibroB'] . "</td>";
                                        echo "<td>" . $row['PaginaB'] . "</td>";
                                        echo "<td>" . $row['PartidaB'] . "</td>";
                                        echo "<td>" . $row['OficialiaRegistroCivil'] . "</td>";
                                        echo "<td>" . $row['Libro'] . "</td>";
                                        echo "<td>" . $row['Partida'] . "</td>";
                                        echo "<td>" . $row['Certifica'] . "</td>";
                                        echo "<td>" . $row['NotasMarginales'] . "</td>";
                                        echo "<td>" . $row['LugarExpedido'] . "</td>";
                                        echo "<td>" . $row['FechaExpedida'] . "</td>";
                                        echo "<td>
                                            <button class='btn btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button>
                                            <button class='btn btn-pdf' onclick=\"window.open('PrintBautismo.php?id=" . $row['Id'] . "', '_blank');\">PDF</button>
                                        </td>";

                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='24'>No hay datos disponibles</td></tr>";
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
            <table id="bautismoTable2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th>Libro Bautismo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            include 'conexion.php';

                            // Consulta SQL para obtener todos los datos de la tabla bautismo
                            $sql = "SELECT * FROM bautismo";
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
                                        echo "<td>" . $row['LibroB'] . "</td>";
                                        //echo "<td><button class='btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button></td>";
                                        //echo "<td><input type='checkbox'></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='24'>No hay datos disponibles</td></tr>";
                                }
                                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>


</html>