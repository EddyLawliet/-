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
    $stmt = $conn->prepare("SELECT * FROM Matrimonio WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $fields = [
            ['x' => 89.4, 'y' => 58.5, 'value' => $row['Iglesia']],
            ['x' => 72.5, 'y' => 65.9, 'value' => $row['Presbitero']],
            ['x' => 176.5, 'y' => 73.3, 'value' => $row['LibroM']],
            ['x' => 41, 'y' => 80, 'value' => $row['PaginaM']],
            ['x' => 70, 'y' => 80, 'value' => $row['PartidaM']],
            ['x' => 100, 'y' => 87.8, 'value' => $row['LugarMatrimonio']." ".$row['FechaMatrimonio']],
            ['x' => 61, 'y' => 98.4, 'value' => $row['ApellidoNombreEsposo']],
            ['x' => 89.4, 'y' => 108.7, 'value' => '"'.$row['BautizadoParroquiaEsposo'].'"'],
            ['x' => 77, 'y' => 118.5, 'value' => $row['PadreEsposo']],
            ['x' => 77, 'y' => 123.8, 'value' => $row['MadreEsposo']],
            ['x' => 65, 'y' => 135, 'value' => $row['ApellidoNombreEsposa']],
            ['x' => 90.5, 'y' => 146, 'value' => $row['BautizadaParroquiaEsposa']],
            ['x' => 77, 'y' => 156.6, 'value' => $row['PadreEsposa']],
            ['x' => 77, 'y' => 161.1, 'value' => $row['MadreEsposa']],
            ['x' => 77, 'y' => 171, 'value' => $row['Padrino']],
            ['x' => 77, 'y' => 175.7, 'value' => $row['Madrina']],
            ['x' => 95.3, 'y' => 183.9, 'value' => $row['LugarMatrimonioCivil']." ".$row['FechaMatrimonioCivil']],
            ['x' => 88, 'y' => 191, 'value' => $row['OficialiaRegistroCivil']],
            ['x' => 125.7, 'y' => 191, 'value' => $row['Libro']],
            ['x' => 158, 'y' => 191, 'value' => $row['Partida']],
            ['x' => 93, 'y' => 199, 'value' => $row['Certifica']],
            ['x' => 64.6, 'y' => 207, 'value' => $row['NotasMarginales']],
            ['x' => 27, 'y' => 244, 'value' => $row['LugarExpedido']]
        ];

        foreach ($fields as $field) {
            $pdf->SetXY($field['x'], $field['y']);
            $pdf->Cell(0, 10,utf8_decode( $field['value']), 0, 1);
        }

        $fechaExpedida = strtotime($row['FechaExpedida']);
        $dia = date('d', $fechaExpedida);
        $mes = getMesEnEspanol(date('F', $fechaExpedida));
        $anio = date('Y', $fechaExpedida);

        $pdf->SetXY(53.5, 244);
        $pdf->Cell(10, 10, $dia, 0, 1);
        $pdf->SetXY(76, 244);
        $pdf->Cell(30, 10, $mes, 0, 1);
        $pdf->SetXY(135.5, 244);
        $pdf->Cell(20, 10, $anio, 0, 1);

        $pdf->Output('I', 'Registro_Matrimonio_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID de registro no proporcionado.";
}
?>
