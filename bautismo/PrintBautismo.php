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
	
		// Crear un nuevo PDF con tamaño de hoja A4
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		//$pdf->SetFont('Arial', 'B', 14);
	
		/* // Agregar contenido al PDF
		$pdf->SetXY(10, 10); // 10 mm desde el borde superior
		$pdf->Cell(0, 10, 'Detalles del Registro de Bautismo', 0, 1, 'C');
		$pdf->Ln(10); // 10 mm de espacio */
	
		// Mostrar los datos del registro
		/* $pdf->SetX(10); // 10 mm desde el borde izquierdo
		$pdf->Cell(50, 10, 'ID:', 0, 0); // 50 mm de ancho
		$pdf->Cell(50, 10, $row['Id'], 0, 1); // 50 mm de ancho
	
		$pdf->SetX(10);
		$pdf->Cell(50, 10, 'Presbitero:', 0, 0); */
		/* 
		$pdf->Cell(50, 10, 'Parroquia:', 0, 0);
		$pdf->SetX(92);
		$pdf->Cell(50, 60, $row['Parroquia'], 0, 1); */

		//$pdf->Cell(50, 10, 'Iglesia:', 0, 0);
		$pdf->SetXY(92, 60);
		$pdf->Cell(0, 10, $row['Iglesia'], 0, 1);
		//$pdf->Ln(10); // 10 mm de espacio
		$pdf->SetXY(82.6, 68.8);
		$pdf->Cell(0, 10, $row['Presbítero'], 0, 1);
		
		//$pdf->Cell(50, 10, 'Libro:', 0, 0);
		$pdf->SetXY(170, 76);
		$pdf->Cell(0, 10, $row['LibroB'], 0, 1);
	
		//$pdf->Cell(50, 10, 'Pagina:', 0, 0);
		$pdf->SetXY(44.7, 83);
		$pdf->Cell(0, 10, $row['PaginaB'], 0, 1);
	
		//$pdf->Cell(50, 10, 'Partida:', 0, 0);
		$pdf->SetXY(88, 83);
		$pdf->Cell(0, 10, $row['PartidaB'], 0, 1);

		//$pdf->SetXY(43, 96);
		$pdf->SetXY(43, 96);
		$pdf->Cell(0, 10, $row['ApellidoPaterno'], 0, 1);
	
		//$pdf->Cell(50, 10, 'Apellido Materno:', 0, 0);
		$pdf->SetXY(89, 96);
		$pdf->Cell(0, 10, $row['ApellidoMaterno'], 0, 1);
	
		//$pdf->Cell(50, 10, 'Nombre:', 0, 0);
		$pdf->SetXY(141, 96);
		$pdf->Cell(0, 10, $row['Nombre'], 0, 1);
	
		//$pdf->Cell(50, 10, 'Lugar de Bautismo:', 0, 0);
		$pdf->SetXY(84, 112.5);
		$pdf->Cell(0, 10, $row['LugarBautismo']." ".$row['FechaBautismo'], 0, 1);
		
		/* $pdf->SetXY(10, 120);
		$pdf->Cell(50, 10, 'Fecha de Bautismo:', 0, 0);
		$pdf->Cell(50, 10, $row['FechaBautismo'], 0, 1); */
	
		//$pdf->Cell(50, 10, 'Lugar de Nacimiento:', 0, 0);
		$pdf->SetXY(84, 120);
		$pdf->Cell(0, 10, $row['LugarNacimiento']." ".$row['FechaNacimiento'], 0, 1);
	
		/* $pdf->SetXY(10, 132.6);
		$pdf->Cell(50, 10, 'Fecha de Nacimiento:', 0, 0);
		$pdf->Cell(50, 10, $row['FechaNacimiento'], 0, 1); */
		
		
		//$pdf->Cell(50, 10, 'FAMILIARES:', 0, 1);
		//$pdf->Cell(50, 10, 'Padre:', 0, 0);
		$pdf->SetXY(77.3, 132.6);
		$pdf->Cell(0, 10, $row['Padre'], 0, 1);
		
		
		//$pdf->Cell(50, 10, 'Madre:', 0, 0);
		$pdf->SetXY(77.3, 140.2);
		$pdf->Cell(0, 10, $row['Madre'], 0, 1);
		
		
		//$pdf->Cell(50, 10, 'Padrino:', 0, 0);
		$pdf->SetXY(77.3, 147.6);
		$pdf->Cell(0, 10, $row['Padrino'], 0, 1);
		
		
		//$pdf->Cell(50, 10, 'Madrina:', 0, 0);
		$pdf->SetXY(77.3, 154.8);
		$pdf->Cell(0, 10, $row['Madrina'], 0, 1);
		
		
		//$pdf->Cell(50, 10, 'OTROS:', 0, 1);
		//$pdf->Cell(50, 10, 'Oficialia Registro Civil:', 0, 0);
		$pdf->SetXY(86.3, 164);
		$pdf->Cell(0, 10, $row['OficialiaRegistroCivil'], 0, 1);
	
		$pdf->SetXY(129, 164);
		$pdf->Cell(0, 10, $row['Libro'], 0, 1);
	
		$pdf->SetXY(173, 164);
		$pdf->Cell(0, 10, $row['Partida'], 0, 1);
	
		$pdf->SetXY(97.4, 172);
		$pdf->Cell(0, 10, $row['Certifica'], 0, 1);

		//$pdf->SetXY(10, 184.4);
		//$pdf->Cell(50, 10, 'Notas Marginales:', 0, 0);
		$pdf->SetXY(82, 184.4);
		$pdf->MultiCell(0, 10, $row['NotasMarginales']); // Usar MultiCell para textos más largos
	
		//$pdf->Cell(50, 10, 'Fecha Expedida:', 0, 0);
		$pdf->SetXY(22, 229);
		$pdf->Cell(0, 10, $row['LugarExpedido'], 0, 1);
		
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
        $pdf->SetXY(49, 229);
        $pdf->Cell(10, 10, $dia, 0, 1);

        // Imprimir mes
        $pdf->SetXY(78, 229);
        $pdf->Cell(30, 10, $mes, 0, 1);

        // Imprimir año
        $pdf->SetXY(123.5, 229);
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
