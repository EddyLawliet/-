<?php
require('fpdf186/fpdf.php');
include('conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM confirmacion WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Función para formatear fechas con mes literal
        function formatDate($date) {
            $fecha = strtotime($date);
            $meses = array(
                '01' => 'enero', '02' => 'febrero', '03' => 'marzo', '04' => 'abril', '05' => 'mayo', '06' => 'junio',
                '07' => 'julio', '08' => 'agosto', '09' => 'septiembre', '10' => 'octubre', '11' => 'noviembre', '12' => 'diciembre'
            );
            $dia = date("d", $fecha);
            $mes = date("m", $fecha);
            $año = date("Y", $fecha);
            return $dia . '/' . $meses[$mes] . '/' . $año;
        }

        // Apartado especifico para fecha expedida
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

        // Crear un nuevo PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        
        // Agregar contenido al PDF
        $pdf->Cell(0, 10, 'Detalles del Registro de Confirmacion', 0, 1, 'C');
        $pdf->Ln(10);
        
        // Mostrar los datos del registro
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'ID:', 0, 0);
        $pdf->Cell(50, 10, $row['Id'], 0, 1);
        
        $pdf->Cell(50, 10, 'Certificador:', 0, 0);
        $pdf->Cell(50, 10, $row['Certificador'], 0, 1);
        
        $pdf->Cell(50, 10, 'Libro:', 0, 0);
        $pdf->Cell(50, 10, $row['Libro'], 0, 1);
        
        $pdf->Cell(50, 10, 'Página:', 0, 0);
        $pdf->Cell(50, 10, $row['Pagina'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nro:', 0, 0);
        $pdf->Cell(50, 10, $row['Nro'], 0, 1);
        
        $pdf->Cell(50, 10, 'Apellido Paterno:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoPaterno'], 0, 1);
        
        $pdf->Cell(50, 10, 'Apellido Materno:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoMaterno'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nombre:', 0, 0);
        $pdf->Cell(50, 10, $row['Nombre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Hij:', 0, 0);
        $pdf->Cell(50, 10, $row['Hij'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nombre Padre:', 0, 0);
        $pdf->Cell(50, 10, $row['NombrePadre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nombre Madre:', 0, 0);
        $pdf->Cell(50, 10, $row['NombreMadre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Fecha Confirmacion:', 0, 0);
        $pdf->Cell(50, 10, formatDate($row['FechaConfirmacion']), 0, 1);
        
        $pdf->Cell(50, 10, 'Confirmador:', 0, 0);
        $pdf->Cell(50, 10, $row['Confirmador'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nombre Padrino/Madrina:', 0, 0);
        $pdf->Cell(50, 10, $row['NombrePadrinoMadrina'], 0, 1);
        
        $pdf->Cell(50, 10, 'Padrino/Madrina 1:', 0, 0);
        $pdf->Cell(50, 10, $row['PadrinoMadrina1'], 0, 1);
        
        $pdf->Cell(50, 10, 'Padrino/Madrina 2:', 0, 0);
        $pdf->Cell(50, 10, $row['PadrinoMadrina2'], 0, 1);
        
        $pdf->Cell(50, 10, 'Iglesia:', 0, 0);
        $pdf->Cell(50, 10, $row['Iglesia'], 0, 1);
        
        $pdf->Cell(50, 10, 'Notas Marginales:', 0, 0);
        $pdf->MultiCell(0, 10, $row['NotasMarginales']); // Usar MultiCell para textos más largos
        
        $pdf->Cell(50, 10, 'Fecha Expedida:', 0, 0);
        $pdf->Cell(50, 10, pruebaDate($row['FechaExpedida']), 0, 1);
        
        // Generar el PDF
        $pdf->Output('I', 'Registro_Confirmacion_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID de registro no proporcionado.";
}
?>
