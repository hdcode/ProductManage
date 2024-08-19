<?php  
require_once "../models/ProductDB.php";
require_once '../models/CategoryDB.php';
require('../fpdf186/fpdf.php');  

class PDF extends FPDF 
{  
    function Header()  
    {  
        $this->SetFont('Arial', 'B', 12);  
        $this->Cell(0, 10, 'Liste des Produits', 0, 1, 'C');  
        $this->Ln(10);  
        $this->SetFont('Courier', 'B', 12);  
        $this->Cell(10, 10, 'N²', 1);  
        $this->Cell(20, 10, 'Name', 1);  
        $this->Cell(20, 10, 'Price', 1);  
        $this->Cell(30, 10, 'Quantity', 1);  
        $this->Cell(60, 10, 'Image', 1);  
        $this->Cell(30, 10, 'CategoryId', 1);  
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

$productdb = new ProductDB();
$categorydb = new CategoryDB();
$products = $productdb->readAll();  

if ($products != null && (sizeof($products) != 0)) {  
    $i = 1;  
    foreach ($products as $prod) {  
        $category = $categorydb->read($prod->categoryId);
        
        $pdf->Cell(10, 10, $i++, 1);  
        $pdf->Cell(20, 10, $prod->name, 1);  
        $pdf->Cell(20, 10, $prod->price, 1);  
        $pdf->Cell(30, 10, $prod->quantity, 1);  
        $pdf->Cell(60, 10, $prod->image, 1);  
        $pdf->Cell(30, 10, $category->libelle, 1);  
        $pdf->Ln();  
    }  
}  

$pdf->Output();  
?>
