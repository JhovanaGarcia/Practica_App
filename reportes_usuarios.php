<?php
require('fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('img/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Moverlo a la Derecha
    $this->Cell(65);
    // Titulo
    $this->Cell(70,10,'Reporte de Usuarios',0,0,'C');
    // Salto de linea
    $this->Ln(20);

    $this->Cell(90,10, 'Usuario', 1, 0, 'C', 0);
    $this->Cell(90,10, 'Privilegio', 1, 1, 'C', 0);

}

// Pagina footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Pagina number
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conectar_utd.php';
$consulta = "select * from usuarios";

$resultado = $conexion->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(90,10, $row['username'], 1, 0, 'C', 0);
	$pdf->Cell(90,10, $row['privilegio'], 1, 1, 'C', 0);
}


$pdf->Output();
?>

