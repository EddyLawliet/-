<?php
require('fpdf186/fpdf.php');
include('conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM Matrimonio WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        // Crear un nuevo PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
    
        // Agregar contenido al PDF
        $pdf->Cell(0, 10, 'Detalles del Registro de Matrimonio', 0, 1, 'C');
        $pdf->Ln(10);
    
        // Función para convertir la fecha
        function formatearFecha($fecha) {
            // Separar la fecha en componentes (día, mes, año)
            $fechaParts = explode('-', $fecha);
            $dia = $fechaParts[2];  // Día
            $mes = $fechaParts[1];  // Mes
            $anio = $fechaParts[0]; // Año

            // Array para los nombres de los meses
            $meses = array(
                "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril", "05" => "Mayo", "06" => "Junio",
                "07" => "Julio", "08" => "Agosto", "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"
            );

            // Obtener el nombre del mes
            $nombreMes = $meses[$mes];

            // Devolver la fecha en el formato deseado
            return $dia . ' de ' . $nombreMes . ' de ' . $anio;
        }
        // Apartado especifico para la fecha expe
        function pruebaDate($date) {
            $fecha = strtotime($date);
            $meses = array(
                '01' => 'enero', '02' => 'febrero', '03' => 'marzo', '04' => 'abril', '05' => 'mayo', '06' => 'junio',
                '07' => 'julio', '08' => 'agosto', '09' => 'septiembre', '10' => 'octubre', '11' => 'noviembre', '12' => 'diciembre'
            );
            $dia = date("d", $fecha);
            $mes = date("m", $fecha);
            $año = date("Y", $fecha);
            return $dia . '/   ' . $meses[$mes] . '/    ' . $año;
        }
    
        // Mostrar los datos del registro
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'ID:', 0, 0);
        $pdf->Cell(50, 10, $row['Id'], 0, 1);
    
        $pdf->Cell(50, 10, 'Iglesia:', 0, 0);
        $pdf->Cell(50, 10, $row['Iglesia'], 0, 1);
    
        $pdf->Cell(50, 10, 'Presbítero:', 0, 0);
        $pdf->Cell(50, 10, $row['Presbítero'], 0, 1);
    
        $pdf->Cell(50, 10, 'Libro Matrimonial:', 0, 0);
        $pdf->Cell(50, 10, $row['LibroM'], 0, 1);
    
        $pdf->Cell(50, 10, 'Página Matrimonial:', 0, 0);
        $pdf->Cell(50, 10, $row['PaginaM'], 0, 1);
    
        $pdf->Cell(50, 10, 'Partida Matrimonial:', 0, 0);
        $pdf->Cell(50, 10, $row['PartidaM'], 0, 1);
    
        $pdf->Cell(50, 10, 'Lugar de Matrimonio:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarMatrimonio'], 0, 1);
    
        // Usar la función para formatear la fecha
        $pdf->Cell(50, 10, 'Fecha de Matrimonio:', 0, 0);
        $pdf->Cell(50, 10, formatearFecha($row['FechaMatrimonio']), 0, 1);
    
        $pdf->Cell(50, 10, 'Nombre:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoNombreEsposo'], 0, 1);
    
        $pdf->Cell(50, 10, 'Parroquia Bautizado:', 0, 0);
        $pdf->Cell(50, 10, $row['BautizadoParroquiaEsposo'], 0, 1);
    
        $pdf->Cell(50, 10, 'Padre:', 0, 0);
        $pdf->Cell(50, 10, $row['PadreEsposo'], 0, 1);
    
        $pdf->Cell(50, 10, 'Madre:', 0, 0);
        $pdf->Cell(50, 10, $row['MadreEsposo'], 0, 1);
    
        $pdf->Cell(50, 10, 'Nombre:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoNombreEsposa'], 0, 1);
    
        $pdf->Cell(50, 10, 'Parroquia Bautizada:', 0, 0);
        $pdf->Cell(50, 10, $row['BautizadaParroquiaEsposa'], 0, 1);
    
        $pdf->Cell(50, 10, 'Padre:', 0, 0);
        $pdf->Cell(50, 10, $row['PadreEsposa'], 0, 1);
    
        $pdf->Cell(50, 10, 'Madre:', 0, 0);
        $pdf->Cell(50, 10, $row['MadreEsposa'], 0, 1);
    
        $pdf->Cell(50, 10, 'Padrino:', 0, 0);
        $pdf->Cell(50, 10, $row['Padrino'], 0, 1);
    
        $pdf->Cell(50, 10, 'Madrina:', 0, 0);
        $pdf->Cell(50, 10, $row['Madrina'], 0, 1);
    
        $pdf->Cell(50, 10, 'Lugar de Matrimonio Civil:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarMatrimonioCivil'], 0, 1);
    
        // Usar la función para formatear la fecha de matrimonio civil
        $pdf->Cell(50, 10, 'Fecha de Matrimonio Civil:', 0, 0);
        $pdf->Cell(50, 10, formatearFecha($row['FechaMatrimonioCivil']), 0, 1);
    
        $pdf->Cell(50, 10, 'Oficialía Registro Civil:', 0, 0);
        $pdf->Cell(50, 10, $row['OficialiaRegistroCivil'], 0, 1);
    
        $pdf->Cell(50, 10, 'Libro:', 0, 0);
        $pdf->Cell(50, 10, $row['Libro'], 0, 1);
 
        $pdf->Cell(50, 10, 'Partida:', 0, 0);
        $pdf->Cell(50, 10, $row['Partida'], 0, 1);

        $pdf->Cell(50, 10, 'Certifica:', 0, 0);
        $pdf->Cell(50, 10, $row['Certifica'], 0, 1);
    
        $pdf->Cell(50, 10, 'Notas Marginales:', 0, 0);
        $pdf->MultiCell(0, 10, $row['NotasMarginales']); // Usar MultiCell para textos más largos
    
        $pdf->Cell(50, 10, 'Lugar Expedido:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarExpedido'], 0, 1);
    
        // Usar la función para formatear la fecha expedida
        $pdf->Cell(50, 10, 'Fecha Expedida:', 0, 0);
        $pdf->Cell(50, 10, pruebaDate($row['FechaExpedida']), 0, 1);
    
        // Generar el PDF
        $pdf->Output('I', 'Registro_Matrimonio_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
    
} else {
    echo "ID de registro no proporcionado.";
}
?>
