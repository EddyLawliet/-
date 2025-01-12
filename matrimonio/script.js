$(document).ready(function() {
    cargarDatos(); 

    //funcion para buscar por datos
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#matrimonioTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    //evento para guardar datos
    $("#matrimonioForm").submit(function(event) {
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
                $("#matrimonioForm")[0].reset();
            },
            error: function() {
                alert("Error al guardar los datos.");
            }
        });
    });

    // Evento para generar el PDF
    $("#btnGenerarPDF").on("click", function() {
    const seleccionado = $("input[type='checkbox']:checked");

        if (seleccionado.length === 0) {
            alert("Por favor, ponga el ✓ al fineal de la fila para generar el PDF");
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
        window.location.href = "PrintMatrimonio.php?id=" + id;
    });

    // Evento para seleccionar una fila
    $(document).on("click", "tbody tr", function() {
        var cells = $(this).children("td");
        $("#id").val(cells.eq(0).text()); // Asigna el ID al campo oculto
        $("#apellidoNombreEsposo").val(cells.eq(1).text());
        $("#apellidoNombreEsposa").val(cells.eq(2).text());
        $("#lugarMatrimonio").val(cells.eq(3).text());
        $("#fechaMatrimonio").val(cells.eq(4).text());
        $("#bautizadoParroquiaEsposo").val(cells.eq(5).text());
        $("#bautizadaParroquiaEsposa").val(cells.eq(6).text());
        $("#padreEsposo").val(cells.eq(7).text());
        $("#madreEsposo").val(cells.eq(8).text());
        $("#padreEsposa").val(cells.eq(9).text());
        $("#madreEsposa").val(cells.eq(10).text());
        $("#padrino").val(cells.eq(11).text());
        $("#madrina").val(cells.eq(12).text());
        $("#iglesia").val(cells.eq(13).text());
        $("#presbítero").val(cells.eq(14).text());
        $("#libroM").val(cells.eq(15).text());
        $("#paginaM").val(cells.eq(16).text());
        $("#partidaM").val(cells.eq(17).text());
        $("#lugarMatrimonioCivil").val(cells.eq(18).text());
        $("#fechaMatrimonioCivil").val(cells.eq(19).text());
        $("#oficialiaRegistroCivil").val(cells.eq(20).text());
        $("#libro").val(cells.eq(21).text());
        $("#partida").val(cells.eq(22).text());
        $("#certifica").val(cells.eq(23).text());
        $("#notasMarginales").val(cells.eq(24).text());
        $("#lugarExpedido").val(cells.eq(25).text());
        $("#fechaExpedida").val(cells.eq(26).text());
    });

});

function cargarDatos() {
    $.ajax({
        url: "acciones.php",
        type: "GET",
        success: function(response) {
            $("tbody").html(response);
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