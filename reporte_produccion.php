<?php
include('TD_reportes.php');
include('conexion.php');
 if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$consulta=mysqli_query($con,"SELECT * from producciones where canti_planta like '%".$otra."%' or total_prod like '%".$otra."%' or cajas like '%".$otra."%' ORDER BY fecha ASC");
 }else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";

      $consulta=mysqli_query($con,"SELECT  * from producciones where fecha like '%".$desde."%' ORDER BY fecha ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $consulta=mysqli_query($con,"SELECT * from producciones where fecha BETWEEN '$desde' and '$hasta' ORDER BY fecha ASC");

}
}
//$consulta=mysqli_query($con,"SELECT * from producciones  ORDER BY fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE PRODUCCION',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(-185,$y+15);
$pdf->SetFont('arial','B',8);
$pdf->Cell(22,10,'Fecha',1,0,'C');
$pdf->Cell(25,10,'Hectareas',1,0,'C');
$pdf->Cell(30,10,'Produccion',1,0,'C');
$pdf->Cell(35,10,'Mermas',1,0,'C');
$pdf->Cell(25,10,utf8_decode('Nº de Cajas'),1,0,'C');
$pdf->Cell(27,10,'Valores',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
  $y=$pdf->GetY();
  $pdf->SetXY(-185,$y);
$pdf->Cell(22,10,$row5['fecha'],1,0,'C');
$pdf->Cell(25,10,$row5['canti_planta'],1,0,'C');
$pdf->Cell(30,10,$row5['total_prod'],1,0,'C');
$pdf->Cell(35,10,$row5['merma'],1,0,'C');
$pdf->Cell(25,10,$row5['cajas'],1,0,'C');
$pdf->Cell(27,10,$row5['valor'],1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
