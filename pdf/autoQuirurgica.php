<?php
#importando lo necesario
session_start();
include('../../config.php');
include('../app/config.php');
include('../layout/sessiones.php');
include('../app/controllers/record/showDatas.php');
# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./img/logoTipo.png', 165, 12, 35, 35, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("FUNDACION HERMANOS ÁVILA POR LA SALUD ")), 0, 0, 'L');

$pdf->Ln(9);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Rnc: 430198961"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "TIBURCIO MILLÁN LÓPEZ 89 A La Romana,Rep Dom "), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: (809) 349-4834"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email:drjoseantonioavila@gmail.com"), 0, 0, 'L');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", date("d/m/Y", strtotime($fech_hora)) . " " . date("h:s A")), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura Nro.")), 0, 0, 'C');

$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(12, 7, iconv("UTF-8", "ISO-8859-1", "Medico:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", "  $nombres_tb"), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("1")), 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Paciente:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "Cedula: "), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $cedula), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $tel), 0, 0);
$pdf->SetTextColor(39, 39, 51);

$pdf->Ln(7);

$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(6, 7, iconv("UTF-8", "ISO-8859-1", "Dir:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(109, 7, iconv("UTF-8", "ISO-8859-1", "$dire"), 0, 0);

$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
$pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
$pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
$pdf->Cell(19, 8, iconv("UTF-8", "ISO-8859-1", "Desc."), 1, 0, 'C', true);
$pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);



/*----------  Detalles de la tabla  ----------*/
$pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", "Nombre de producto a vender"), 'L', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", "7"), 'L', 0, 'C');
$pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", "$10 USD"), 'L', 0, 'C');
$pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", "$0.00 USD"), 'L', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$70.00 USD"), 'LR', 0, 'C');
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/



$pdf->SetFont('Arial', 'B', 9);

# Impuestos & totales #
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $70.00 USD"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "IVA (13%)"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $0.00 USD"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');


$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$70.00 USD"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$100.00 USD"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "CAMBIO"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$30.00 USD"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "USTED AHORRA"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$0.00 USD"), '', 0, 'C');

$pdf->Ln(12);
#firma de autorizacion paciente
$pdf->SetFont('Arial', '', 9);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "______________________"), 0, 0);
$pdf->Ln(5);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", "  Firma Paciente"), 0, 0, 'L');


#firma de autorizacion medico
$pdf->SetFont('Arial', '', 9);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "______________________"), 1, 0);
$pdf->Ln(6);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", "  Firma Medico"), 0, 0, 'L');




# Nombre del archivo PDF #
$pdf->Output("I", "Factura_Nro_1.pdf", true);