<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    
    <title>REGISTRO DE MATRIMONIO</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
                    <input type="date" id="fechaExpedida" name="fechaExpedida">

                    <div class="form-buttons">
                        <button type="submit" id="insertarBtn">Guardar</button>
                        <button type="submit" id="actualizarBtn">Modificar</button>
                        <button type="reset">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-container">
            <h2>Registros de Matrimonio</h2>
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
                        <th>Apellido Nombre Esposo</th>
                        <th>Apellido Nombre Esposa</th>
                        <th>Lugar Matrimonio Religioso</th>
                        <th>Fecha Matrimonio Religioso</th>
                        <th>Bautizado Parroquia Esposo</th>
                        <th>Bautizada Parroquia Esposa</th>
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
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los registros se cargarán aquí mediante AJAX -->
                </tbody>
            </table>
            <button id="btnGenerarPDF">Generar PDF de Seleccionado</button>
            <button id="btnPrint">Generar Impresión</button>
        </div>
    </div>
</body>


</html>
