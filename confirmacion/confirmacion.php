<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>REGISTRO DE CONFIRMACION</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .mensaje { color: green; display: none; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000000; padding: 8px; text-align: left; cursor: pointer; }
        th { background-color: dark; }
    </style>
    <script>
        $(document).ready(function() {
            cargarDatos(); 

            //funcion para buscar por datos
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#confirmacionTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            //evento para guardar datos
            $("#confirmacionForm").submit(function(event) {
                event.preventDefault();
    
                let actionType = '';

                if ($("#insertarBtn").is(":focus")) {
                    actionType = 'insertar';
                } else if ($("#actualizarBtn").is(":focus")) {
                    actionType = 'actualizar';
                }
                $.ajax({
                    url: "acciones.php",
                    type: "POST",
                    data: $(this).serialize() + '&action=' + actionType,  // Agrega 'action' al dato enviado
                    success: function(response) {
                        cargarDatos();
                        alert("Registro " + (actionType == 'insertar' ? "guardado" : "actualizado") + " exitosamente.");
                        $("#confirmacionForm")[0].reset();
                    },
                    error: function() {
                        alert("Error al guardar los datos.");
                    }
                });
            });


            // Evento para generar el PDF del registro seleccionado
            $("#btnGenerarPDF").on("click", function() {
            const seleccionado = $("input[type='checkbox']:checked");

                if (seleccionado.length === 0) {
                    alert("Por favor, ponga el ✓ al fineal de la fila para generar el PDF.");
                    return;
                }
                const id = seleccionado.val();
                window.location.href = "generar_pdf.php?id=" + id;
            });
            // Evento para generar el PDF del registro seleccionado
            $("#btnPrint").on("click", function() {
                const seleccionado = $("input[type='checkbox']:checked");

                if (seleccionado.length === 0) {
                    alert("Por favor, selecciona un registro para generar la Impresión.");
                    return;
                }
                const id = seleccionado.val();
                window.location.href = "PrintConfirmacion.php?id=" + id;
            });


            // Evento para seleccionar una fila
            $(document).on("click", "tbody tr", function() {
                var cells = $(this).children("td");
                $("#id").val(cells.eq(0).text()); // Asigna el ID al campo oculto
                $("#apellidoPaterno").val(cells.eq(1).text());
                $("#apellidoMaterno").val(cells.eq(2).text());
                $("#nombre").val(cells.eq(3).text());
                $("#hij").val(cells.eq(4).text());
                $("#nombrePadre").val(cells.eq(5).text());
                $("#nombreMadre").val(cells.eq(6).text());
                $("#fechaConfirmacion").val(cells.eq(7).text());
                $("#confirmador").val(cells.eq(8).text());
                $("#nombrePadrinoMadrina").val(cells.eq(9).text());
                $("#padrinoMadrina1").val(cells.eq(10).text());
                $("#padrinoMadrina2").val(cells.eq(11).text());
                $("#certificador").val(cells.eq(12).text());
                $("#libro").val(cells.eq(13).text());
                $("#pagina").val(cells.eq(14).text());
                $("#nro").val(cells.eq(15).text());
                $("#iglesia").val(cells.eq(16).text());
                $("#notasMarginales").val(cells.eq(17).text());
                $("#fechaExpedida").val(cells.eq(18).text());
            });
        });

        function cargarDatos() {
            $.ajax({
                url: "acciones.php",
                type: "GET",
                success: function(response) {
                    $("tbody").html(response);

                    // Agregar evento de eliminación a cada botón de eliminar
                    $(".btnEliminar").on("click", function() {
                        let id = $(this).data("id");
                        if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                            eliminarRegistro(id);
                        }
                    });
                }
            });
        }

        function eliminarRegistro(id) {
            $.ajax({
                url: "acciones.php",
                type: "POST",
                data: { id: id, accion: "eliminar" },
                success: function(response) {
                    cargarDatos();
                    alert("Registro eliminado exitosamente.");
                },
                error: function() {
                    alert("Error al eliminar el registro.");
                }
            });
        }
    </script>
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
                    <input type="date" id="fechaExpedida" name="fechaExpedida">

                    <div class="form-buttons">
                        <button type="submit" id="insertarBtn">Guardar</button>
                        <button type="submit" id="actualizarBtn">Modificar</button>
                        <button type="reset">Limpiar</button>
                    </div>
                </div>
                
            </form>
            <div class="section">
                        <button id="btnPrint">Generar Impresión</button>
            </div>
        </div>

        <div class="table-container">
            <h2>Registros de Confirmación</h2>
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
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los registros se cargarán aquí mediante AJAX -->
                </tbody>
            </table>
            <!-- <button id="btnGenerarPDF">Generar PDF de Seleccionado</button> -->
            
        </div>
    </div>
</body>



</html>
