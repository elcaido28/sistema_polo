<?php
include('conexion.php');

require 'FPDF/fpdf.php';

class PDF extends FPDF
{

  function Header()
  {
   $this->image('logomenu.png',10,5,25);
   $this->SetFont('arial','B',10);
   $this->SetXY(145,6);
   $this->Cell(50,10,'Fecha: Guayaquil, '.date('d-m-y').'',0,1,'C');
   $this->SetFont('arial','B',14);
   $this->SetXY(80,10);
   $this->Cell(50,10,'HACIENDA POLO',0,1,'C');
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
