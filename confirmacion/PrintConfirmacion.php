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

    $sql = "SELECT * FROM confirmacion WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $fields = [
            ['x' => 57.4, 'y' => 41.3, 'value' => $row['Certificador']],
            ['x' => 76, 'y' => 51, 'value' => $row['Libro']],
            ['x' => 169.6, 'y' => 50, 'value' => "LA PARROQUIA"],
            ['x' => 24, 'y' => 58.7, 'value' => $row['Iglesia']],
            ['x' => 130, 'y' => 58.7, 'value' => $row['Pagina']],
            ['x' => 153.5, 'y' => 58.7, 'value' => $row['Nro']],
            ['x' => 90, 'y' => 78.6, 'value' => $row['ApellidoPaterno']." ".$row['ApellidoMaterno']." ".$row['Nombre']],
            ['x' => 17.2, 'y' => 87.3, 'value' => $row['Hij']],
            ['x' => 41.3, 'y' => 87.3, 'value' => $row['NombrePadre']],
            ['x' => 133.6, 'y' => 87.3, 'value' => $row['NombreMadre']],
            ['x' => 54.5, 'y' => 95, 'value' => $row['Confirmador']],
            ['x' => 86.5, 'y' => 104, 'value' => $row['NombrePadrinoMadrina']],
            ['x' => 45, 'y' => 104, 'value' => $row['PadrinoMadrina1']],
            ['x' => 64, 'y' => 104, 'value' => $row['PadrinoMadrina2']]
        ];

        foreach ($fields as $field) {
            $pdf->SetXY($field['x'], $field['y']);
            $pdf->Cell(0, 10, utf8_decode($field['value']), 0, 1);
        }

        $fechaConfirmacion = strtotime($row['FechaConfirmacion']);
        $diaConfirmacion = date('d', $fechaConfirmacion);
        $mesConfirmacion = getMesEnEspanol(date('F', $fechaConfirmacion));
        $anioConfirmacion = date('Y', $fechaConfirmacion);

        $pdf->SetXY(151.6, 95);
        $pdf->Cell(10, 10, $diaConfirmacion, 0, 1);
        $pdf->SetXY(168.5, 95);
        $pdf->Cell(30, 10, $mesConfirmacion, 0, 1);
        $pdf->SetXY(197, 95);
        $pdf->Cell(20, 10, $anioConfirmacion, 0, 1);

        $fechaExpedida = strtotime($row['FechaExpedida']);
        $diaExpedida = date('d', $fechaExpedida);
        $mesExpedida = getMesEnEspanol(date('F', $fechaExpedida));
        $anioExpedida = date('Y', $fechaExpedida);

        $pdf->SetXY(102.9, 127.8);
        $pdf->Cell(10, 10, $diaExpedida, 0, 1);
        $pdf->SetXY(141, 127.8);
        $pdf->Cell(30, 10, $mesExpedida, 0, 1);
        $pdf->SetXY(188.7, 127.8);
        $pdf->Cell(20, 10, $anioExpedida, 0, 1);

        $pdf->Output('I', 'Registro_' . $row['Id'] . '.pdf');
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID de registro no proporcionado.";
}
?>
