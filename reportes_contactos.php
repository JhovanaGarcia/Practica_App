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
    $this->Cell(70,10,'Reporte de Contactos',0,0,'C');
    // Salto de linea
    $this->Ln(20);

    $this->Cell(10,10, 'Id', 1, 0, 'C', 0);
    $this->Cell(30,10, 'Nombre(s)', 1, 0, 'C', 0);
    $this->Cell(30,10, 'Apellidos', 1, 0, 'C', 0);
    $this->Cell(30,10, 'Direccion', 1, 0, 'C', 0);
    $this->Cell(35,10, 'Telefono', 1, 0, 'C', 0);
    $this->Cell(60,10, 'Email', 1, 1, 'C', 0);

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
$consulta = "select * from contactos";

$resultado = $conexion->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10,10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['apellidos'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['direccion'], 1, 0, 'C', 0);
	$pdf->Cell(35,10, $row['telefono'], 1, 0, 'C', 0);
	$pdf->Cell(60,10, $row['email'], 1, 1, 'C', 0);
}


$pdf->Output();
?>

