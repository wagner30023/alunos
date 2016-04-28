<?php

ini_set('display_errors', TRUE);

error_reporting(E_ALL | E_STRICT); // Para PHP >= 5 e < 5.4

require_once "./app/class/Usuario.php";
require_once "./app/class/UsuarioDAO.php";

$result = UsuarioDAO::Select();

/*
  echo "<pre>";
  var_dump($result);
  exit();
  echo "</pre>";
 */

require_once './app/fpdf17/fpdf.php';
$pdf = new FPDF("P", "pt", "A4");
ob_start();
//$pdf->Open();

foreach ($result as $row):
    echo '<tr>';
    echo '<td><span class="td-align">' . $row['id'] . '</span></td>';
    echo '<td><span class="td-align">' . $row['nome'] . '</span></td>';
    echo '<td><span class="td-align">' . $row['email'] . '</span></td>';
    echo '<td><span class="td-align">' . $row['datanasc'] . '</span></td>';
    echo '</tr>';
endforeach;


$pdf->SetFont('arial', 'B', 18);
$pdf->Cell(0, 5, "Ficha", 0, 1, 'C');
$pdf->Cell(0, 5, "", "B", 1, 'C');
$pdf->Ln(8);

// id 

$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(70, 20, "id:", 0, 0, 'L');
$pdf->setFont('arial', '', 12);
$pdf->Cell(0, 20, $row['id'], 0, 1, 'L');


//nome
$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(70, 20, "nome:", 0, 0, 'L');
$pdf->setFont('arial', '', 12);
$pdf->Cell(0, 20, $row['nome'], 0, 1, 'L');

// email
$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(70, 20, "email:", 0, 0, 'L');
$pdf->setFont('arial', '', 12);
$pdf->Cell(0, 20, $row['email'], 0, 1, 'L');

// datanasc
$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(70, 20, "datanasc:", 0, 0, 'L');
$pdf->setFont('arial', '', 12);
$pdf->Cell(0, 20, $row['datanasc'], 0, 1, 'L');


echo "<br />";

/*
echo "<pre>";
var_dump($pdf);
exit();
echo "</pre>";
*/


ob_clean();
$pdf->Output("arquivo.pdf", "I");



