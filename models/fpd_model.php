<?php

include "fpdf182/fpdf.php";

function preview_user_list($out,$db){
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    $var = mysqli_fetch_assoc(list_employee(3,$db)) ;
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10, $var["userName"]." ".$var["userPrename"]);

    $pdf->Output($out);
}

if(isset($_GET['out'])){
    preview_user_list($_GET['out'],$db);
}