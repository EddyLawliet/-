<?php
require('fpdf186/fpdf.php');
include('conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM bautismo WHERE Id = ?";
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
        // Crear un nuevo PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        
        // Agregar contenido al PDF
        $pdf->Cell(0, 10, 'Detalles del Registro de Bautismo', 0, 1, 'C');
        $pdf->Ln(10);
        
        // Mostrar los datos del registro
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'ID:', 0, 0);
        $pdf->Cell(50, 10, $row['Id'], 0, 1);
        
        $pdf->Cell(50, 10, 'Iglesia:', 0, 0);
        $pdf->Cell(50, 10, $row['Iglesia'], 0, 1);
        
        $pdf->Cell(50, 10, 'Presbítero:', 0, 0);
        $pdf->Cell(50, 10, $row['Presbítero'], 0, 1);
        
        $pdf->Cell(50, 10, 'Libro de Bautismo:', 0, 0);
        $pdf->Cell(50, 10, $row['LibroB'], 0, 1);
        
        $pdf->Cell(50, 10, 'Página:', 0, 0);
        $pdf->Cell(50, 10, $row['PaginaB'], 0, 1);
        
        $pdf->Cell(50, 10, 'Partida:', 0, 0);
        $pdf->Cell(50, 10, $row['PartidaB'], 0, 1);
        
        $pdf->Cell(50, 10, 'Apellido Paterno:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoPaterno'], 0, 1);
        
        $pdf->Cell(50, 10, 'Apellido Materno:', 0, 0);
        $pdf->Cell(50, 10, $row['ApellidoMaterno'], 0, 1);
        
        $pdf->Cell(50, 10, 'Nombre:', 0, 0);
        $pdf->Cell(50, 10, $row['Nombre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Lugar de Bautismo:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarBautismo'], 0, 1);
        
        $pdf->Cell(50, 10, 'Fecha Bautismo:', 0, 0);
        $pdf->Cell(50, 10, formatDate($row['FechaBautismo']), 0, 1);
        
        $pdf->Cell(50, 10, 'Lugar de Nacimiento:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarNacimiento'], 0, 1);
        
        $pdf->Cell(50, 10, 'Fecha Nacimiento:', 0, 0);
        $pdf->Cell(50, 10, formatDate($row['FechaNacimiento']), 0, 1);
        
        $pdf->Cell(50, 10, 'Padre:', 0, 0);
        $pdf->Cell(50, 10, $row['Padre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Madre:', 0, 0);
        $pdf->Cell(50, 10, $row['Madre'], 0, 1);
        
        $pdf->Cell(50, 10, 'Padrino:', 0, 0);
        $pdf->Cell(50, 10, $row['Padrino'], 0, 1);
        
        $pdf->Cell(50, 10, 'Madrina:', 0, 0);
        $pdf->Cell(50, 10, $row['Madrina'], 0, 1);
        
        $pdf->Cell(50, 10, 'Oficialia Registro Civil:', 0, 0);
        $pdf->Cell(50, 10, $row['OficialiaRegistroCivil'], 0, 1);
        
        $pdf->Cell(50, 10, 'Libro:', 0, 0);
        $pdf->Cell(50, 10, $row['Libro'], 0, 1);
        
        $pdf->Cell(50, 10, 'Partida:', 0, 0);
        $pdf->Cell(50, 10, $row['Partida'], 0, 1);
        
        $pdf->Cell(50, 10, 'Certificador:', 0, 0);
        $pdf->Cell(50, 10, $row['Certifica'], 0, 1);
        
        $pdf->Cell(50, 10, 'Notas Marginales:', 0, 0);
        $pdf->MultiCell(0, 10, $row['NotasMarginales']); // Usar MultiCell para textos más largos
        
        $pdf->Cell(50, 10, 'Lugar Expedida:', 0, 0);
        $pdf->Cell(50, 10, $row['LugarExpedido'], 0, 1);
        
        $pdf->Cell(50, 10, 'Fecha Expedida:', 0, 0);
        $pdf->Cell(50, 10, pruebaDate($row['FechaExpedida']), 0, 1);
        
        // Generar el PDF
        $pdf->Output('I', 'Registro_Bautismo_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID de registro no proporcionado.";
}
?>
