<?php
require '../../db.php';

$usuario = $_SESSION['username'];

if (!isset($usuario)) {
header("Location: ../../index.php");
}

$cedula = $_SESSION['cedula'];

include('C:/xampp/htdocs/ProyectoFinal/login/Inquilino/PDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Factura',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20, 10, 'N Factura', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Apartamento', 1, 0, 'C', 0);
    $this->Cell(23, 10, 'CC Inquilino', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'Concepto', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Pago', 1, 0, 'C', 0);
    $this->Cell(26, 10, '# Cuenta', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Fecha de pago', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}



$query = "SELECT * FROM dt_apart_inqui WHERE cedula_inquilino='$cedula'";
$result = mysqli_query($conn, $query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $row['n_factura'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['id_apartamentos'], 1, 0, 'C', 0);
    $pdf->Cell(23, 10, $row['cedula_inquilino'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['concepto'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['pago'], 1, 0, 'C', 0);
    $pdf->Cell(26, 10, $row['n_cuenta'], 1, 0, 'C', 0);
    $pdf->Cell(50, 10, $row['fecha'], 1, 1, 'C', 0);
}

$pdf->Output();
?>