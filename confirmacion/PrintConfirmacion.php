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
        
		// Crear un nuevo PDF con tamaño de hoja A4
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);

        /* 
        $pdf->Cell(50, 10, 'ID:', 0, 0);
        $pdf->Cell(50, 10, $row['Id'], 0, 1); */
        
        /* $pdf->Cell(50, 10, 'Certificador:', 0, 0); */
        $pdf->SetXY(57.4, 41.3);
        $pdf->Cell(50, 10, $row['Certificador'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Libro:', 0, 0); */
        $pdf->SetXY(76, 51);
        $pdf->Cell(50, 10, $row['Libro'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Iglesia:', 0, 0); */
        $pdf->SetXY(169.6, 50);
		$pdf->Cell(0, 10, "LA PARROQUIA", 0, 1);

        $pdf->SetXY(24, 58.7);
		$pdf->Cell(0, 10, $row['Iglesia'], 0, 1);
        

        /* $pdf->Cell(50, 10, 'Página:', 0, 0); */
        $pdf->SetXY(130, 58.7);
        $pdf->Cell(50, 10, $row['Pagina'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Nro:', 0, 0); */
        $pdf->SetXY(153.5, 58.7);
        $pdf->Cell(50, 10, $row['Nro'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Apellido Paterno:', 0, 0); */
        $pdf->SetXY(90, 78.6);
        $pdf->Cell(50, 10, $row['ApellidoPaterno']." ".$row['ApellidoMaterno']." ".$row['Nombre'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Apellido Materno:', 0, 0); */
        /* $pdf->SetXY(90, 78.6);
        $pdf->Cell(50, 10, $row['ApellidoMaterno'], 0, 1); */
        
        /* $pdf->Cell(50, 10, 'Nombre:', 0, 0); */
        /* $pdf->SetXY(140, 78.6);
        $pdf->Cell(50, 10, $row['Nombre'], 0, 1); */
        
        /* $pdf->Cell(50, 10, 'Hij:', 0, 0); */
        $pdf->SetXY(17.2, 87.3);
        $pdf->Cell(50, 10, $row['Hij'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Nombre Padre:', 0, 0); */
        $pdf->SetXY(41.3, 87.3);
        $pdf->Cell(50, 10, $row['NombrePadre'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Nombre Madre:', 0, 0); */
        $pdf->SetXY(133.6, 87.3);
        $pdf->Cell(50, 10, $row['NombreMadre'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Confirmador:', 0, 0); */
        $pdf->SetXY(54.5, 95);
        $pdf->Cell(50, 10, $row['Confirmador'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Fecha Confirmacion:', 0, 0); */
        
        $fechaExpedida = strtotime($row['FechaConfirmacion']);
        $dia = date('d', $fechaExpedida);
        $mes = date('F', $fechaExpedida);
        $anio = date('Y', $fechaExpedida);

        // Convertir el mes a español
        $meses = array(
            'January' => 'Enero',
            'February' => 'Febrero',
            'March' => 'Marzo',
            'April' => 'Abril',
            'May' => 'Mayo',
            'June' => 'Junio',
            'July' => 'Julio',
            'August' => 'Agosto',
            'September' => 'Septiembre',
            'October' => 'Octubre',
            'November' => 'Noviembre',
            'December' => 'Diciembre'
        );
        $mes = $meses[$mes];

        // Imprimir día
        $pdf->SetXY(151.6, 95);
        $pdf->Cell(10, 10, $dia, 0, 1);

        // Imprimir mes
        $pdf->SetXY(168.5, 95);
        $pdf->Cell(30, 10, $mes, 0, 1);

        // Imprimir año
        $pdf->SetXY(197, 95);
        $pdf->Cell(20, 10, $anio, 0, 1);



        
        /* $pdf->Cell(50, 10, 'Nombre Padrino/Madrina:', 0, 0); */
        $pdf->SetXY(86.5, 104);
        $pdf->Cell(50, 10, $row['NombrePadrinoMadrina'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Padrino/Madrina 1:', 0, 0); */
        $pdf->SetXY(45, 104);
        $pdf->Cell(50, 10, $row['PadrinoMadrina1'], 0, 1);
        
        /* $pdf->Cell(50, 10, 'Padrino/Madrina 2:', 0, 0); */
        $pdf->SetXY(64, 104);
        $pdf->Cell(50, 10, $row['PadrinoMadrina2'], 0, 1);
        
        
        /* $pdf->Cell(50, 10, 'Notas Marginales:', 0, 0); */
        /* $pdf->SetXY(, );
        $pdf->MultiCell(0, 10, $row['NotasMarginales']); */ // Usar MultiCell para textos más largos
        
        /* $pdf->Cell(50, 10, 'Fecha Expedida:', 0, 0); */
        // Separar la fecha en día, mes y año
        $fechaExpedida = strtotime($row['FechaExpedida']);
        $dia = date('d', $fechaExpedida);
        $mes = date('F', $fechaExpedida);
        $anio = date('Y', $fechaExpedida);

        // Convertir el mes a español
        $meses = array(
            'January' => 'Enero',
            'February' => 'Febrero',
            'March' => 'Marzo',
            'April' => 'Abril',
            'May' => 'Mayo',
            'June' => 'Junio',
            'July' => 'Julio',
            'August' => 'Agosto',
            'September' => 'Septiembre',
            'October' => 'Octubre',
            'November' => 'Noviembre',
            'December' => 'Diciembre'
        );
        $mes = $meses[$mes];

        // Imprimir día
        $pdf->SetXY(102.9, 127.8);
        $pdf->Cell(10, 10, $dia, 0, 1);

        // Imprimir mes
        $pdf->SetXY(141, 127.8);
        $pdf->Cell(30, 10, $mes, 0, 1);

        // Imprimir año
        $pdf->SetXY(188.7, 127.8);
        $pdf->Cell(20, 10, $anio, 0, 1);
        
        
		// Generar el PDF
		$pdf->Output('I', 'Registro_' . $row['Id'] . '.pdf');
	} else {
		echo "Registro no encontrado.";
	}
	
} else {
	echo "ID de registro no proporcionado.";
}
?>
