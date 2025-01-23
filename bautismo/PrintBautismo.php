<?php
require('../library/fpdf186/fpdf.php');
include('../conexion.php');

function getMesEnEspanol($mesIngles) {
	$meses = [
		'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo',
		'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio',
		'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre',
		'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
	];
	return $meses[$mesIngles];
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM bautismo WHERE Id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);

		// You can change this value to move all positions up (+) or down (-)
		$yOffset = 0; 
		
		// You can change this value to move all positions left (-) or right (+)
		$xOffset = 0; 

		$fields = [
			['x' => 92 + $xOffset, 'y' => 60 + $yOffset, 'value' => $row['Iglesia']],
			['x' => 82.6 + $xOffset, 'y' => 68.8 + $yOffset, 'value' => $row['Presbitero']],
			['x' => 170 + $xOffset, 'y' => 76 + $yOffset, 'value' => $row['LibroB']],
			['x' => 44.7 + $xOffset, 'y' => 83 + $yOffset, 'value' => $row['PaginaB']],
			['x' => 88 + $xOffset, 'y' => 83 + $yOffset, 'value' => $row['PartidaB']],
			['x' => 43 + $xOffset, 'y' => 96 + $yOffset, 'value' => $row['ApellidoPaterno']],
			['x' => 89 + $xOffset, 'y' => 96 + $yOffset, 'value' => $row['ApellidoMaterno']],
			['x' => 141 + $xOffset, 'y' => 96 + $yOffset, 'value' => $row['Nombre']],
			['x' => 84 + $xOffset, 'y' => 112.5 + $yOffset, 'value' => $row['LugarBautismo']." ".$row['FechaBautismo']],
			['x' => 84 + $xOffset, 'y' => 120 + $yOffset, 'value' => $row['LugarNacimiento']." ".$row['FechaNacimiento']],
			['x' => 77.3, 'y' => 132.6 + $yOffset, 'value' => $row['Padre']],
			['x' => 77.3, 'y' => 140.2 + $yOffset, 'value' => $row['Madre']],
			['x' => 77.3, 'y' => 154.8, 'value' => $row['Madrina']],
			['x' => 86.3, 'y' => 164, 'value' => $row['OficialiaRegistroCivil']],
			['x' => 129, 'y' => 164, 'value' => $row['Libro']],
			['x' => 173, 'y' => 164, 'value' => $row['Partida']],
			['x' => 97.4, 'y' => 172, 'value' => $row['Certifica']],
			['x' => 82, 'y' => 184.4, 'value' => $row['NotasMarginales']],
			['x' => 22, 'y' => 229, 'value' => $row['LugarExpedido']],
		];

		foreach ($fields as $field) {
			$pdf->SetXY($field['x'], $field['y']);
			$pdf->Cell(0, 10, utf8_decode($field['value']), 0, 1);
		}

		$fechaExpedida = strtotime($row['FechaExpedida']);
		$dia = date('d', $fechaExpedida);
		$mes = getMesEnEspanol(date('F', $fechaExpedida));
		$anio = date('Y', $fechaExpedida);

		$pdf->SetXY(49, 229);
		$pdf->Cell(10, 10, $dia, 0, 1);
		$pdf->SetXY(78, 229);
		$pdf->Cell(30, 10, $mes, 0, 1);
		$pdf->SetXY(123.5, 229);
		$pdf->Cell(20, 10, $anio, 0, 1);

<<<<<<< HEAD
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
=======
>>>>>>> 49a3c186a6ac46038411f92e4c7a84cce39f13de
		$pdf->Output('I', 'Registro_' . $row['Id'] . '.pdf');
	} else {
		echo "Registro no encontrado.";
	}
} else {
	echo "ID de registro no proporcionado.";
}
?>
