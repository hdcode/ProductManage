<?php  
require_once "../models/CategoryDB.php";
require('../fpdf186/fpdf.php');  

class PDF extends FPDF 
{  
    function Header()  
    {  
        $this->SetFont('Arial', 'B', 12);  
        $this->Cell(0, 10, 'Liste des Categories', 0, 1, 'C');  
        $this->Ln(10);  
        $this->SetFont('Courier', 'B', 12);  
        $this->Cell(10, 10, 'N²', 1);  
        $this->Cell(60, 10, 'Name', 1);  
        $this->Cell(70, 10, 'Description', 1);  
        $this->Cell(30, 10, 'Actions', 1);  
        $this->Ln();  
    }  

    function Footer()  
    {  
        $this->SetY(-15);  
        $this->SetFont('Arial', 'I', 8);  
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');  
    }  
}  

$pdf = new PDF();  
$pdf->AddPage();  
$pdf->SetFont('Arial', '', 12);  

$categorydb = new CategoryDB();
$categories = $categorydb->readAll();  

if ($categories != null && (sizeof($categories) != 0)) {  
    $i = 1;  
    foreach ($categories as $cat) {  
        $pdf->Cell(10, 10, $i++, 1);  
        $pdf->Cell(60, 10, $cat->libelle, 1);  
        $pdf->Cell(70, 10, $cat->description, 1);  
        $pdf->Cell(30, 10, '', 1); // Placeholder for actions (you may add more details if you want)  
        $pdf->Ln();  
    }  
}  

$pdf->Output();  
?>
