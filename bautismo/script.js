$(document).ready(function() {
    //funcion para buscar por datos
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#bautismoTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#search2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#bautismoTable2 tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
    
    //evento para guardar datos
    $("#bautismoForm").submit(function(event) {
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
            data: $(this).serialize() + '&action=' + actionType,
            success: function(response) {
                alert("Registro " + (actionType == 'insertar' ? "guardado" : "actualizado") + " exitosamente.");
                $("#bautismoForm")[0].reset();
            },
            error: function() {
                alert("Error al guardar los datos.");
            }
        });
    });

    // Función de eliminar datos con AJAX
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

    // Evento para generar el PDF del registro seleccionado
    // $("#btnGenerarPDF").on("click", function() {
    //    const seleccionado = $("input[type='checkbox']:checked");
    //
    //    if (seleccionado.length === 0) {
    //        alert("Por favor, ponga el ✓ al final de la linea para generar el PDF.");
    //        return;
    //    }
    //    const id = seleccionado.val();
    //    window.location.href = "PrintBautismo.php?id=" + id;
    // });


    // Evento para seleccionar una fila
    $(document).on("click", "tbody tr", function() {
        var cells = $(this).children("td");
        $("#id").val(cells.eq(0).text()); // Asigna el ID al campo oculto
        $("#apellidoPaterno").val(cells.eq(1).text());
        $("#apellidoMaterno").val(cells.eq(2).text());
        $("#nombre").val(cells.eq(3).text());
        $("#lugarBautismo").val(cells.eq(4).text());
        $("#fechaBautismo").val(cells.eq(5).text());
        $("#lugarNacimiento").val(cells.eq(6).text());
        $("#fechaNacimiento").val(cells.eq(7).text());
        $("#padre").val(cells.eq(8).text());
        $("#madre").val(cells.eq(9).text());
        $("#padrino").val(cells.eq(10).text());
        $("#madrina").val(cells.eq(11).text());
        $("#iglesia").val(cells.eq(12).text());
        $("#presbítero").val(cells.eq(13).text());
        $("#libroB").val(cells.eq(14).text());
        $("#paginaB").val(cells.eq(15).text());
        $("#partidaB").val(cells.eq(16).text());
        $("#oficialiaRegistroCivil").val(cells.eq(17).text());
        $("#libro").val(cells.eq(18).text());
        $("#partida").val(cells.eq(19).text());
        $("#certifica").val(cells.eq(20).text());
        $("#notasMarginales").val(cells.eq(21).text());
        $("#lugarExpedido").val(cells.eq(22).text());
        $("#fechaExpedida").val(cells.eq(23).text());
    });

    $('#modal').click(function() {
        // Actualizar los valores de los campos del modal con los datos del formulario
        $('#paternoModal').text($('#apellidoPaterno').val());
        $('#maternoModal').text($('#apellidoMaterno').val());
        $('#nombreModal').text($('#nombre').val());
        $('#lugarBautismoModal').text($('#lugarBautismo').val());
        $('#fechaBautismoModal').text($('#fechaBautismo').val());
        $('#lugarNacimientoModal').text($('#lugarNacimiento').val());
        $('#fechaNacimientoModal').text($('#fechaNacimiento').val());
        $('#padreModal').text($('#padre').val());
        $('#madreModal').text($('#madre').val());
        $('#padrinoModal').text($('#padrino').val());
        $('#madrinaModal').text($('#madrina').val());
        $('#iglesiaModal').text($('#iglesia').val());
        $('#presbiteroModal').text($('#presbítero').val());
        $('#libroBModal').text($('#libroB').val());
        $('#paginaBModal').text($('#paginaB').val());
        $('#partidaBModal').text($('#partidaB').val());
        $('#oficialiaModal').text($('#oficialiaRegistroCivil').val());
        $('#libroModal').text($('#libro').val());
        $('#partidaModal').text($('#partida').val());
        $('#certificaModal').text($('#certifica').val());
        $('#notasMarginalesModal').text($('#notasMarginales').val());
        $('#lugarExpedidoModal').text($('#lugarExpedido').val());
        $('#fechaExpedidaModal').text($('#fechaExpedida').val());
    });
});
