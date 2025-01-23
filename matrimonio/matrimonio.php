<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <title>REGISTRO DE MATRIMONIO</title>
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
    $pagina = "matrimonio";
    /* include "../header.php"; */
    ?>
    <div class="form-table-container">
        <div class="form-container">
            <h2>Registro de Matrimonio</h2>
            <form id="matrimonioForm" action="acciones.php" method="POST">
                <input type="hidden" id="id" name="id">

                <label for="iglesia">Iglesia:</label>
                <input type="text" id="iglesia" name="iglesia" required>

                <label for="presbítero">Presbítero:</label>
                <input type="text" id="presbítero" name="presbítero" required>

                <label for="libroM">Libro Matrimonio:</label>
                <input type="text" id="libroM" name="libroM">

                <label for="paginaM">Página Matrimonio:</label>
                <input type="text" id="paginaM" name="paginaM">

                <label for="partidaM">Partida Matrimonio:</label>
                <input type="text" id="partidaM" name="partidaM">

                <label for="lugarMatrimonio">Lugar Matrimonio Religioso:</label>
                <input type="text" id="lugarMatrimonio" name="lugarMatrimonio" required>

                <label for="fechaMatrimonio">Fecha Matrimonio Religioso:</label>
                <input type="date" id="fechaMatrimonio" name="fechaMatrimonio" required>

                <div class="section">
                    <h3>DATOS DEL ESPOSO</h3><br>

                    <label for="apellidoNombreEsposo">Apellido y Nombre:</label>
                    <input type="text" id="apellidoNombreEsposo" name="apellidoNombreEsposo" required>

                    <label for="bautizadoParroquiaEsposo">Bautizado en Parroquia:</label>
                    <input type="text" id="bautizadoParroquiaEsposo" name="bautizadoParroquiaEsposo">

                    <label for="padreEsposo">Padre:</label>
                    <input type="text" id="padreEsposo" name="padreEsposo">

                    <label for="madreEsposo">Madre:</label>
                    <input type="text" id="madreEsposo" name="madreEsposo">
                </div>

                <div class="section">
                    <h3>DATOS DE LA ESPOSA</h3><br>

                    <label for="apellidoNombreEsposa">Apellido y Nombre:</label>
                    <input type="text" id="apellidoNombreEsposa" name="apellidoNombreEsposa" required>

                    <label for="bautizadaParroquiaEsposa">Bautizada en Parroquia:</label>
                    <input type="text" id="bautizadaParroquiaEsposa" name="bautizadaParroquiaEsposa">

                    <label for="padreEsposa">Padre:</label>
                    <input type="text" id="padreEsposa" name="padreEsposa">

                    <label for="madreEsposa">Madre:</label>
                    <input type="text" id="madreEsposa" name="madreEsposa">
                </div>

                <div class="section">
                    <h3>DATOS DE TESTIGOS</h3><br>

                    <label for="padrino">Padrino:</label>
                    <input type="text" id="padrino" name="padrino">

                    <label for="madrina">Madrina:</label>
                    <input type="text" id="madrina" name="madrina">
                </div>

                <div class="section">
                    <h3>DATOS DEL MATRIMONIO CIVIL</h3><br>

                    <label for="lugarMatrimonioCivil">Lugar Matrimonio Civil:</label>
                    <input type="text" id="lugarMatrimonioCivil" name="lugarMatrimonioCivil">

                    <label for="fechaMatrimonioCivil">Fecha Matrimonio Civil:</label>
                    <input type="date" id="fechaMatrimonioCivil" name="fechaMatrimonioCivil">
                </div>

                <div class="section">
                    <h3>REGISTRO CIVIL</h3><br>

                    <label for="oficialiaRegistroCivil">Oficialía Registro Civil:</label>
                    <input type="text" id="oficialiaRegistroCivil" name="oficialiaRegistroCivil">

                    <label for="libro">Libro:</label>
                    <input type="text" id="libro" name="libro">

                    <label for="partida">Partida:</label>
                    <input type="text" id="partida" name="partida">
                </div>

                <div class="section">
                    <h3>OTROS</h3><br>

                    <label for="certifica">Certifica:</label>
                    <input type="text" id="certifica" name="certifica" required>

                    <label for="notasMarginales">Notas Marginales:</label>
                    <textarea id="notasMarginales" name="notasMarginales"></textarea>

                    <label for="lugarExpedido">Lugar Expedido:</label>
                    <input type="text" id="lugarExpedido" name="lugarExpedido">

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
                                    <p>Esposo: <span style="margin-left: 20px;" id="apellidoNombreEsposoModal"></span></p>
                                    <p>Esposa: <span style="margin-left: 20px;" id="apellidoNombreEsposaModal"></span></p>
                                    <p>Lugar Matrimonio: <span style="margin-left: 20px;" id="lugarMatrimonioModal"></span></p>
                                    <p>Fecha Matrimonio: <span style="margin-left: 20px;" id="fechaMatrimonioModal"></span></p>
                                    <p>Bautizado Parroquia Esposo: <span style="margin-left: 20px;" id="bautizadoParroquiaEsposoModal"></span></p>
                                    <p>Bautizada Parroquia Esposa: <span style="margin-left: 20px;" id="bautizadaParroquiaEsposaModal"></span></p>
                                    <p>Padre Esposo: <span style="margin-left: 20px;" id="padreEsposoModal"></span></p>
                                    <p>Madre Esposo: <span style="margin-left: 20px;" id="madreEsposoModal"></span></p>
                                    <p>Padre Esposa: <span style="margin-left: 20px;" id="padreEsposaModal"></span></p>
                                    <p>Madre Esposa: <span style="margin-left: 20px;" id="madreEsposaModal"></span></p>
                                    <p>Padrino: <span style="margin-left: 20px;" id="padrinoModal"></span></p>
                                    <p>Madrina: <span style="margin-left: 20px;" id="madrinaModal"></span></p>
                                    <p>Iglesia: <span style="margin-left: 20px;" id="iglesiaModal"></span></p>
                                    <p>Presbítero: <span style="margin-left: 20px;" id="presbiteroModal"></span></p>
                                    <p>Libro Matrimonio: <span style="margin-left: 20px;" id="libroMModal"></span></p>
                                    <p>Página Matrimonio: <span style="margin-left: 20px;" id="paginaMModal"></span></p>
                                    <p>Partida Matrimonio: <span style="margin-left: 20px;" id="partidaMModal"></span></p>
                                    <p>Lugar Matrimonio Civil: <span style="margin-left: 20px;" id="lugarMatrimonioCivilModal"></span></p>
                                    <p>Fecha Matrimonio Civil: <span style="margin-left: 20px;" id="fechaMatrimonioCivilModal"></span></p>
                                    <p>Oficialía Registro Civil: <span style="margin-left: 20px;" id="oficialiaModal"></span></p>
                                    <p>Libro: <span style="margin-left: 20px;" id="libroModal"></span></p>
                                    <p>Partida: <span style="margin-left: 20px;" id="partidaModal"></span></p>
                                    <p>Certifica: <span style="margin-left: 20px;" id="certificaModal"></span></p>
                                    <p>Notas Marginales: <span style="margin-left: 20px;" id="notasMarginalesModal"></span></p>
                                    <p>Lugar Expedido: <span style="margin-left: 20px;" id="lugarExpedidoModal"></span></p>
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
                    <h5 class="modal-title" id="staticBackdropLabel">REGISTRO DE MATRIMONIO</h5>
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
                        <table id="matrimonioTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Esposo</th>
                                    <th>Esposa</th>
                                    <th>Lugar Matrimonio</th>
                                    <th>Fecha Matrimonio</th>
                                    <th>Bautizado en Parroquia Esposo</th>
                                    <th>Bautizada en Parroquia Esposa</th>
                                    <th>Padre Esposo</th>
                                    <th>Madre Esposo</th>
                                    <th>Padre Esposa</th>
                                    <th>Madre Esposa</th>
                                    <th>Padrino</th>
                                    <th>Madrina</th>
                                    <th>Iglesia</th>
                                    <th>Presbítero</th>
                                    <th>Libro Matrimonio</th>
                                    <th>Página Matrimonio</th>
                                    <th>Partida Matrimonio</th>
                                    <th>Lugar Matrimonio Civil</th>
                                    <th>Fecha Matrimonio Civil</th>
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
                            $sql = "SELECT * FROM matrimonio";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['Id'] . "</td>";
                                    echo "<td>" . $row['ApellidoNombreEsposo'] . "</td>";
                                    echo "<td>" . $row['ApellidoNombreEsposa'] . "</td>";
                                    echo "<td>" . $row['LugarMatrimonio'] . "</td>";
                                    echo "<td>" . $row['FechaMatrimonio'] . "</td>";
                                    echo "<td>" . $row['BautizadoParroquiaEsposo'] . "</td>";
                                    echo "<td>" . $row['BautizadaParroquiaEsposa'] . "</td>";
                                    echo "<td>" . $row['PadreEsposo'] . "</td>";
                                    echo "<td>" . $row['MadreEsposo'] . "</td>";
                                    echo "<td>" . $row['PadreEsposa'] . "</td>";
                                    echo "<td>" . $row['MadreEsposa'] . "</td>";
                                    echo "<td>" . $row['Padrino'] . "</td>";
                                    echo "<td>" . $row['Madrina'] . "</td>";
                                    echo "<td>" . $row['Iglesia'] . "</td>";
                                    echo "<td>" . $row['Presbítero'] . "</td>";
                                    echo "<td>" . $row['LibroM'] . "</td>";
                                    echo "<td>" . $row['PaginaM'] . "</td>";
                                    echo "<td>" . $row['PartidaM'] . "</td>";
                                    echo "<td>" . $row['LugarMatrimonioCivil'] . "</td>";
                                    echo "<td>" . $row['FechaMatrimonioCivil'] . "</td>";
                                    echo "<td>" . $row['OficialiaRegistroCivil'] . "</td>";
                                    echo "<td>" . $row['Libro'] . "</td>";
                                    echo "<td>" . $row['Partida'] . "</td>";
                                    echo "<td>" . $row['Certifica'] . "</td>";
                                    echo "<td>" . $row['NotasMarginales'] . "</td>";
                                    echo "<td>" . $row['LugarExpedido'] . "</td>";
                                    echo "<td>" . $row['FechaExpedida'] . "</td>";
                                    echo "<td>
                                        <button class='btn btnEliminar' data-id='" . $row['Id'] . "'>Eliminar</button>
                                        <button class='btn btn-pdf' onclick=\"window.open('PrintMatrimonio.php?id=" . $row['Id'] . "', '_blank');\">PDF</button>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='28'>No hay datos disponibles</td></tr>";
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
            <table id="matrimonioTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Esposo</th>
                        <th>Esposa</th>
                        <th>Libro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conexion.php';

                        // Consulta SQL para obtener todos los datos de la tabla matrimonio
                        $sql = "SELECT * FROM matrimonio";
                        $result = $conn->query($sql);

                        // Verificar si hay resultados
                        if ($result->num_rows > 0) {
                            // Recorrer y mostrar cada fila de la tabla
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Id'] . "</td>";
                                echo "<td>" . $row['ApellidoNombreEsposo'] . "</td>";
                                echo "<td>" . $row['ApellidoNombreEsposa'] . "</td>";
                                echo "<td>" . $row['LibroM'] . "</td>";
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
