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
    
        // Crear un nuevo PDF con tamaño de hoja A4
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetXY(89.4, 58.5);
        $pdf->Cell(0, 10, $row['Iglesia'], 0, 1);

        $pdf->SetXY(72.5, 65.9);
        $pdf->Cell(0, 10, $row['Presbítero'], 0, 1);

        $pdf->SetXY(176.5, 73.3);
        $pdf->Cell(0, 10, $row['LibroM'], 0, 1);

        $pdf->SetXY(41, 80);
        $pdf->Cell(0, 10, $row['PaginaM'], 0, 1);

        $pdf->SetXY(70, 80);
        $pdf->Cell(0, 10, $row['PartidaM'], 0, 1);

        $pdf->SetXY(100, 87.8);
        $pdf->Cell(0, 10, $row['LugarMatrimonio']." ".$row['FechaMatrimonio'], 0, 1);

        $pdf->SetXY(61, 98.4);
        $pdf->Cell(0, 10, $row['ApellidoNombreEsposo'], 0, 1);

        $pdf->SetXY(89.4, 108.7);
        $pdf->Cell(0, 10, '"'.$row['BautizadoParroquiaEsposo'].'"', 0, 1);

        $pdf->SetXY(77, 118.5);
        $pdf->Cell(0, 10, $row['PadreEsposo'], 0, 1);

        $pdf->SetXY(77, 123.8);
        $pdf->Cell(0, 10, $row['MadreEsposo'], 0, 1);

        $pdf->SetXY(65, 135);
        $pdf->Cell(0, 10, $row['ApellidoNombreEsposa'], 0, 1);

        $pdf->SetXY(90.5, 146);
        $pdf->Cell(0, 10, $row['BautizadaParroquiaEsposa'], 0, 1);

        $pdf->SetXY(77, 156.6);
        $pdf->Cell(0, 10, $row['PadreEsposa'], 0, 1);

        $pdf->SetXY(77, 161.1);
        $pdf->Cell(0, 10, $row['MadreEsposa'], 0, 1);

        $pdf->SetXY(77, 171);
        $pdf->Cell(0, 10, $row['Padrino'], 0, 1);

        $pdf->SetXY(77, 175.7);
        $pdf->Cell(0, 10, $row['Madrina'], 0, 1);

        $pdf->SetXY(95.3, 183.9);
        $pdf->MultiCell(0, 10, $row['LugarMatrimonioCivil']." ".$row['FechaMatrimonioCivil']);
        
        $pdf->SetXY(88, 191);
        $pdf->MultiCell(0, 10, $row['OficialiaRegistroCivil']);
        
        $pdf->SetXY(125.7, 191);
        $pdf->MultiCell(0, 10, $row['Libro']);
        
        $pdf->SetXY(158, 191);
        $pdf->MultiCell(0, 10, $row['Partida']);
        
        $pdf->SetXY(93, 199);
        $pdf->MultiCell(0, 10, $row['Certifica']);
        
        $pdf->SetXY(64.6, 207);
        $pdf->MultiCell(0, 10, $row['NotasMarginales']);

        $pdf->SetXY(27, 244);
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
        $pdf->SetXY(53.5, 244);
        $pdf->Cell(10, 10, $dia, 0, 1);

        // Imprimir mes
        $pdf->SetXY(76, 244);
        $pdf->Cell(30, 10, $mes, 0, 1);

        // Imprimir año
        $pdf->SetXY(135.5, 244);
        $pdf->Cell(20, 10, $anio, 0, 1);



        // Generar el PDF
        $pdf->Output('I', 'Registro_Matrimonio_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
    
} else {
    echo "ID de registro no proporcionado.";
}
?>
