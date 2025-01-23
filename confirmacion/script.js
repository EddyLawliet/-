$(document).ready(function() {
    //funcion para buscar por datos
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#confirmacionTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#search2").on("keyup", function() {
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
                alert("Registro " + (actionType == 'insertar' ? "guardado" : "actualizado") + " exitosamente.");
                $("#confirmacionForm")[0].reset();
            },
            error: function() {
                alert("Error al guardar los datos.");
            }
        });
    });

    $(document).on("click", ".btnEliminar", function() {
        var id = $(this).data("id");
        var row = $(this).closest("tr");

        if (confirm("¿Está seguro de eliminar este registro?")) {
            $.ajax({
                url: "acciones.php",
                type: "POST",
                data: { action: 'eliminar', id: id },
                success: function(response) {
                    row.remove();
                    alert("Registro eliminado exitosamente.");
                },
                error: function() {
                    alert("Error al eliminar el registro.");
                }
            });
        }
    });

    // Evento para generar el PDF
    //$("#btnGenerarPDF").on("click", function() {
    //const seleccionado = $("input[type='checkbox']:checked");
    //
    //    if (seleccionado.length === 0) {
    //        alert("Por favor, ponga el ✓ al fineal de la fila para generar el PDF");
    //        return;
    //    }
    //    const id = seleccionado.val();
    //    window.location.href = "generar_pdf.php?id=" + id;
    //});

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
    

    $('#modal').click(function() {
        // Actualizar los valores de los campos del modal con los datos del formulario
        $('#apellidoPaternoModal').text($('#apellidoPaterno').val());
        $('#apellidoMaternoModal').text($('#apellidoMaterno').val());
        $('#nombreModal').text($('#nombre').val());
        $('#hijModal').text($('#hij').val());
        $('#nombrePadreModal').text($('#nombrePadre').val());
        $('#nombreMadreModal').text($('#nombreMadre').val());
        $('#fechaConfirmacionModal').text($('#fechaConfirmacion').val());
        $('#confirmadorModal').text($('#confirmador').val());
        $('#nombrePadrinoMadrinaModal').text($('#nombrePadrinoMadrina').val());
        $('#padrinoMadrina1Modal').text($('#padrinoMadrina1').val());
        $('#padrinoMadrina2Modal').text($('#padrinoMadrina2').val());
        $('#certificadorModal').text($('#certificador').val());
        $('#libroModal').text($('#libro').val());
        $('#paginaModal').text($('#pagina').val());
        $('#nroModal').text($('#nro').val());
        $('#iglesiaModal').text($('#iglesia').val());
        $('#notasMarginalesModal').text($('#notasMarginales').val());
        $('#fechaExpedidaModal').text($('#fechaExpedida').val());
    });
    
});